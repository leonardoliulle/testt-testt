<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testt Compile</title>
</head>
<body>


<form method="post" action="">
    @csrf
    <div>
        <label for="msg">Mensagem:</label>
        <input type="text" id="msg" name="msg" required>
    </div>
    <div>
        <label for="pass">senha:</label>
        <input type="password" id="pass" name="pass" required>
    </div>
    <div>
        <!-- <label for="ip">IP Address:</label> -->
        <input type="text" id="ip" name="ip" value="{{substr($_SERVER['REMOTE_ADDR'],-2)}}" hidden>
    </div>
    <button type="submit">Submit</button>
</form>

</body>
</html>