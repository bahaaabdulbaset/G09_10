<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLoginView() {
        if(\Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function doLogin(Request $request) {
        $data = $request->all();

        $rules = [
          'username' => 'required|min:5|max:100',
          'password' => 'required|min:5|max:125',
        ];
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect('/login')
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }

        if (\Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            return redirect('/');
        } else {
            return redirect('/login')
                ->withInput($request->all())
                ->withErrors(['login' => 'Username and/or password is/are wrong!']);
        }

    }

    public function getRegisterView() {
        if(\Auth::check()) {
            return redirect('/');
        }
        return view('auth.register');
    }

    public function doRegistration(Request $request) {
        $data = $request->all();

        $rules = [
            'firstName' => 'required|min:5|max:60',
            'lastName' => 'max:60',
            'email' => 'required|min:5|max:125|email|unique:users,email',
            'username' => 'required|min:5|max:100|unique:users,username',
            'password' => 'required|min:5|max:125',
            'gender' => '',
            'bio' => 'max:1000',
            'phoneNumber' => 'max:30',
            'address' => 'max:125',
        ];
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect('/register')
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }

        $newUser = new \App\User();
        $newUser->first_name = $data['firstName'];
        $newUser->last_name = $data['lastName'];
        $newUser->email = $data['email'];
        $newUser->username = $data['username'];
        $newUser->password = bcrypt($data['password']);
        $newUser->gender_id = $data['gender'];
        $newUser->bio = $data['bio'];
        $newUser->phone_number = $data['phoneNumber'];
        $newUser->address = $data['address'];
        $newUser->save();

        return redirect('/login')
            ->with(['success'=>'You are registered successfully']);

    }

    public function doLogout() {
        \Auth::logout();
        return redirect('/login');
    }
}
