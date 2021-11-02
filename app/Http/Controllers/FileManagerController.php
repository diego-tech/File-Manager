<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileManagerController extends Controller
{
    /**
     * @param $request : Valor que saca del formulario introducido
     * @return view : Vista, array con los datos, errores
     */
    public function FileManager(Request $request)
    {
        $array = array();
        $arrayResult = array();
        $errorStr = "";
        $fileName = "";
        if ($request->has('file') && $request->isMethod('post')) {
            $fileName = $request->input('fileName');

            if ($fileName != "") {
                $request->file('file')->storeAs(
                    'public',
                    $fileName
                );
            } else {
                $errorStr = "De un nombre al archivo";
            }
        }

        $files = Storage::files('/public');

        foreach ($files as $value) {

            $exp = explode('public/', $value);

            $mime = Storage::mimeType($value);
            $explode = explode('/', $mime);

            if ($explode[0] == 'image') {
                $url = Storage::url($value);
            } else {
                $url = null;
            }

            $array = [
                'filename' => $exp[1],
                'image' => $url
            ];

            array_push($arrayResult, $array);
        }

        return view('index', ['files' => $arrayResult, 'errorStr' => $errorStr]);
    }

    /**
     * @param valor
     * @return descarga
     */
    public function Download($value)
    {
        $url = Storage::url($value);

        $split = explode('storage/', $url);
        $append = implode('public/', $split);

        return Storage::download($append);
    }
}
