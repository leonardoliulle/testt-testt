
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