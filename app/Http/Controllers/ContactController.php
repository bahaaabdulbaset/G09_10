<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContactUsView() {
        return view('contact-us');
    }

    public function saveFeedback(Request $request) {
        $data = $request->all();

        $rules = [
            'name' => 'required|max:60|min:3',
            'phone' => 'max:25|required',
            'feedback' => 'max:1000|required',
            'email' => 'required|email|max:125',
        ];

        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect('/contact-us')
                ->withInput($data)
                ->withErrors($validator->errors());
        }

        $element = new \App\Feedback();
        $element->name = $data['name'];
        $element->phone = $data['phone'];
        $element->email = $data['email'];
        $element->feedback = $data['feedback'];
        $element->save();

        return redirect('/contact-us')
            ->with(['success' => 'Feedback is sent successfully!']);
    }
}
