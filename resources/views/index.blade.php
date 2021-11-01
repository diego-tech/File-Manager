<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Ficheros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Gestor de Ficheros</h1>

    <div class="container">
        <div id="forms">
            <form method="POST" action="" id="form" enctype="multipart/form-data">
                @csrf
                <input id="file" type="file" name="file" value="Seleccionar Archivo">
                <br>
                <input id="filenameinput" type="text" name="fileName" autocomplete="off" placeholder="Nombra al archivo">
                <br>
                <input id="submit" type="submit" name="submit" value="Guardar Archivo">
            </form>
        </div>
        @if ($files != null)
        <div id="files">
            @foreach($files as $key => $values)
            <ul class="list list-group">
                <li class="list-group-item">
                    @if($values['image'] != null)
                    <img src="{{ asset($values['image']) }}" alt="">
                    @else
                    <img src="file.png" alt="">
                    @endif
                    <a id="filename" href="{{route('downloadfile', $values['filename'])}}" target="_blank"> {{ $values['filename'] }} </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    @if ($errorStr != "")
    <div id="errors">
        <h4>{{ $errorStr }}</h4>
    </div>
    @endif
</body>

</html>