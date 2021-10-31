<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Ficheros</title>
    <style>
        h1 {
            text-align: center;
        }

        img {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <h1>Gestor de Ficheros</h1>

    <form method="POST" action="" id="form" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <br>
        <input type="text" name="fileName">
        <br>
        <input type="submit" name="submit" value="Guardar Archivo">
    </form>

    <form method="POST" action="">
        <table>
            <ul>
                @foreach ($files ?? '' as $value)
                <img src=" {{ asset($files['image']) }}" alt="">
                <li><a href="{{route('downloadfile', $files['file'])}}" target="_blank"> {{ $files['file']}} </a></li>
                @endforeach
            </ul>
        </table>
    </form>
</body>

</html>