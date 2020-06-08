<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function getUploadFileView() {
        return view('tests.upload-file');
    }

    public function doUploading(Request $request) {

        $rules = [
            'f' => 'required|max:2048|mimes:jpg,jpeg,png'
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/tests/upload-file')
                ->withErrors($validator->errors());
        }

        $f = $request->file('f');
        $ext = $f->getClientOriginalExtension();
        $name = $f->getClientOriginalName();

        $newName = sha1(time()) . "." . $ext;

        \Storage::disk('public')->put($newName, \File::get($f));
    }
}
