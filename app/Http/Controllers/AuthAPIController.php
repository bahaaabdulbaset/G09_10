<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthAPIController extends Controller
{
    public function doLogin(Request $request)
    {
        $data = $request->all();

        $rules = [
            'username' => 'required|min:5|max:100',
            'password' => 'required|min:5|max:125',
        ];
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
            $reply = [
                'failed' => true,
                'errors' => $validator->errors()->all(),
                'data' => null,
            ];
            return response()->json($reply);
        }

        if (\Auth::attempt(['username' => $data['username'],
            'password' => $data['password']])) {

            $apiToken = sha1(time());
            $user = \Auth::user();
            $user->api_token = $apiToken;
            $user->save();

            $user = \App\User::where('id', '=', $user->id)
                ->with('image')
                ->with('gender')
                ->first();
            $reply = [
                'failed' => false,
                'errors' => null,
                'data' => [
                    'apiToken' => $user->api_token,
                    'fullName' => $user->first_name . " " . $user->last_name,
                    'imageUrl' => $user->image ? $user->image->path: null,
                ],
            ];
            return response()->json($reply);

        } else {
            $reply = [
                'failed' => true,
                'errors' => ['Username and/or password is/are wrong!'],
                'data' => null,
            ];
            return response()->json($reply);
        }

    }

    public function doLogout(Request $request)
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
            $user->api_token = "";
            $user->save();

            $reply = [
                'failed' => false,
                'errors' => null,
                'data' => null,
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
