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

        image {
            width: 100px;
            height: 100px;
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

    <table>
        <ul>
            @foreach ($files as $value)
            <li>Value: {{ $value }}</li>
            @endforeach
        </ul>
    </table>

    <img src="{{ asset($image)}}" alt="">

</body>

</html>