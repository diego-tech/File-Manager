<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileManagerController extends Controller
{
    public function FileManager(Request $request)
    {
        //TODO: Realizar array asociativo con  los ficheros para poder mostrar en conjunto la miniatura, el enlace de descarga y el nombre del fichero
        $array = array();

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
                if ($value1 != "") {
                    array_push($array, $value1);
                }
            }

            $mime = Storage::mimeType($value);

            $explode = explode('/', $mime);

            if ($explode[0] == 'image') {
                $url = Storage::url($value);
            }
        }
        return view('index', ['files' => $array, 'image' => $url]);
    }

    public function Download($value)
    {
        $url = Storage::url($value);

        $split = explode('storage/', $url);
        $append = implode('public/', $split);

        return Storage::download($append);
    }
}
