<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testt Compile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<br>
<div class='container'>
    <form method="post" action="{{route('testt.store')}}">
        @csrf
        <div>
            <label for="msg">Mensagem:</label>
            <input class='form-control' type="text" id="msg" name="msg" required>
        </div>
        <div>
            <label for="pass">Senha:</label>
            <input class='form-control' type="password" id="pass" name="pass" required>
        </div>
        <div>
            <!-- <label for="ip">IP Address:</label> -->
            <input type="text" id="ip" name="ip" value="{{substr($_SERVER['REMOTE_ADDR'],-2)}}" hidden>
        </div>
        <button class='btn btn-primary' type="submit">Criptar</button>
    </form>
</div>
</body>
</html>