<!-- resources/views/items/create.blade.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar em uma sala</title>
</head>
<body class="container">
    <h1>Entrar em uma sala</h1>

    <form action="{{ route('userpublic.store') }}" method="POST">
        @csrf
        <label for="name">Eu sou:</label>
        <input class="form-control col-sm-6" type="text" id="name" name="name">
        <br>
        <label for="pass">Sala:</label>
        <input class='form-control col-sm-6' id="pass" name="pass"></input>
        <br>
        <button class="btn btn-primary" type="submit">Save Item</button>
    </form>
</body>
</html>
