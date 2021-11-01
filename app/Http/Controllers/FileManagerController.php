<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class FileManagerController extends Controller
{
    public function FileManager(Request $request)
    {
        $array = array();
        $arrayResult = array();

        if ($request->has('file') && $request->isMethod('post')) {
            $fileName = $request->input('fileName');

            $request->file('file')->storeAs(
                'public',
                $fileName
            );
        }

        $files = Storage::files('/public');

        foreach ($files as $value) {

            $exp = explode('public/', $value);

            foreach ($exp as $value1) {
                if ($value1 != "") {
                }
            }

            $mime = Storage::mimeType($value);
            $explode = explode('/', $mime);

            if ($explode[0] == 'image') {
                $url = Storage::url($value);
            } else {
                $url = Storage::url('imgassets/file.png');
            }

            $array = [
                'filename' => $value1,
                'image' => $url
            ];

            array_push($arrayResult, $array);
        }

        return view('index', ['files' => $arrayResult]);
    }

    public function Download($value)
    {
        $url = Storage::url($value);

        $split = explode('storage/', $url);
        $append = implode('public/', $split);

        return Storage::download($append);
    }
}
