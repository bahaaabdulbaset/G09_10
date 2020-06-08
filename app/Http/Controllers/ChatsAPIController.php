<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatsAPIController extends Controller
{
    public function getChats(Request $request)
    {
        $apiToken = $request->get('api_token');

        $rules = [
            'api_token' => 'required|max:125',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $reply = [
                'failed' => true,
                'errors' => $validator->errors()->toArray(),
                'data' => null,
            ];
            return response()->json($reply);
        }

        $user = \App\User::where('api_token', '=', $apiToken)->first();

        if ($user) {
            // CHATs
            $data = [];

            $sentMessages = $user->sentMessages;
            $sendUserIDs = $sentMessages->pluck('second_user_id')->unique()->toArray();
            $sendUsers = \App\User::find($sendUserIDs);
            foreach ($sendUsers as $sendUser) {
                $lastMessage = \App\Chat::where('first_user_id', '=', $user->id)
                    ->where('second_user_id', '=', $sendUser->id)
                    ->orderBy('created_at', 'DESC')->first();

                array_push($data, [
                    "uID" => $sendUser->id,
                    "fullName" => $sendUser->first_name . " " . $sendUser->last_name,
                    "imageUrl" => $sendUser->image->path,
                    "lastMsgContent" => $lastMessage->message,
                    "lastMsgIsSeen" => $lastMessage->is_seen,
                    "lastMsgIsForward" => $lastMessage->is_forward,
                    "lastMsgTimestamp" => $lastMessage->created_at,
                ]);
            }

            $recMessages = $user->receivedMessages;
            $recUserIDs = $recMessages->pluck('first_user_id')->unique()->toArray();
            $recUsers = \App\User::find($recUserIDs);
            foreach ($recUsers as $recUser) {
                $lastMessage = \App\Chat::where('second_user_id', '=', $user->id)
                    ->where('first_user_id', '=', $recUser->id)
                    ->orderBy('created_at', 'DESC')->first();

                array_push($data, [
                    "uID" => $recUser->id,
                    "fullName" => $recUser->first_name . " " . $recUser->last_name,
                    "imageUrl" => $recUser->image->path,
                    "lastMsgContent" => $lastMessage->message,
                    "lastMsgIsSeen" => $lastMessage->is_seen,
                    "lastMsgIsForward" => $lastMessage->is_forward,
                    "lastMsgTimestamp" => $lastMessage->created_at,
                ]);
            }

            $reply = [
                'failed' => false,
                'errors' => null,
                'data' => $data,
            ];
            return response()->json($reply);

        } else {
            $reply = [
                'failed' => true,
                'errors' => ['Wrong API token.'],
                'data' => null,
            ];
            return response()->json($reply);
        }
    }

    public function getMessages(Request $request, $uID)
    {
        $apiToken = $request->get('api_token');

        $rules = [
            'api_token' => 'required|max:125',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $reply = [
                'failed' => true,
                'errors' => $validator->errors()->toArray(),
                'data' => null,
            ];
            return response()->json($reply);
        }

        $user = \App\User::where('api_token', '=', $apiToken)->first();

        if ($user) {

            $messages = \App\Chat::where(function ($query) use ($user, $uID) {
                $query->where('first_user_id', '=', $user->id)
                ->where('second_user_id', '=', $uID);
            })->orWhere(function ($query) use ($user, $uID) {
                $query->where('second_user_id', '=', $user->id)
                    ->where('first_user_id', '=', $uID);
            })->orderBy('created_at', 'ASC')->get();

            $reply = [
                'failed' => false,
                'errors' => null,
                'data' => $messages,
            ];
            return response()->json($reply);
        } else {
            $reply = [
                'failed' => true,
                'errors' => ['Wrong API token.'],
                'data' => null,
            ];
            return response()->json($reply);
        }
    }

    public function sendMessage(Request $request, $uID)
    {
        $apiToken = $request->get('api_token');

        $rules = [
            'api_token' => 'required|max:125',
            'message' => 'required|max:1000|min:1'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $reply = [
                'failed' => true,
                'errors' => $validator->errors()->all(),
                'data' => null,
            ];
            return response()->json($reply);
        }

        $user = \App\User::where('api_token', '=', $apiToken)->first();

        if ($user) {

            $newMessage = new \App\Chat();
            $newMessage->first_user_id = $user->id;
            $newMessage->second_user_id = $uID;
            $newMessage->is_seen = false;
            $newMessage->is_forward = true;
            $newMessage->message = $request->get('message');
            $newMessage->save();

            $reply = [
                'failed' => false,
                'errors' => null,
                'data' => $newMessage,
            ];
            return response()->json($reply);

        } else {
            $reply = [
                'failed' => true,
                'errors' => ['Wrong API token.'],
                'data' => null,
            ];
            return response()->json($reply);
        }
    }
}
