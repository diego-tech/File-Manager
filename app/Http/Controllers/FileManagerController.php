<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileManagerController extends Controller
{
    public function FileManager(Request $request)
    {
        $array = [];
        if ($request->has('file') && $request->isMethod('post')) {
            $fileName = $request->input('fileName');

            $request->file('file')->storeAs(
                'public',
                $fileName
            );
        }

        $files = Storage::allFiles('/public');

        foreach ($files as $value) {
            $exp = explode('public/', $value);

            foreach ($exp as $value1) {
                array_push($array, $value1);
            }

            $mime = Storage::mimeType($value);

            $explode = explode('/', $mime);

            if ($explode[0] == 'image') {
                $url = Storage::url($value);
            }
        }

        /*
        foreach ($array as $value) {
            print($value . "<br>");
        }*/

        return view('index', ['files' => $files, 'image' => $url]);
    }
}
