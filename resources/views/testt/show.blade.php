
<body>
<br>
<div class='container'>

 

    <form action="" method='POST'>
        @csrf
        <label for="senha">Senha:</label>
        <input class='form-control sm-6' type="text" value="" name='pass' autocomplete='off'/>
        <button type='submit' class='btn btn-danger' type='submit' value='Descriptografar'>Descriptografar</button>
    </form>

    <h3>Mensagens   :</h3>


    @php $prevItem = null; $side = 'left'; $time = date('Y-m-d H:i:s');  @endphp 
    
    @foreach ($testt as $item)
        @if ($item->pass == request('pass')) 
            @if ($prevItem !== null && $prevItem !== $item->ip)
                {{-- Change side --}}
                @php $side = ($side == 'left') ? 'right' : 'left'; @endphp
            @endif
            <div align='{{$side}}'>
            {{ $item->msg}}
            <br><b style='font-size: 8px;'>
                Quando: {{ $item->created_at}}
                Quem: {{{ substr(md5($item->ip),0,5)}}} 
            </b>
            @php $prevItem = $item->ip @endphp
        <br>
        @elseif (request('pass') == null)
                       
            <div align='{{$side}}'>
                
                {{ hash('sha256',Crypt::encryptString($item->msg))}}
                <br><b style='font-size: 8px;'>
                    Quando: {{ $time }}
                    Quem: {{ substr(md5(rand(1, 20)),0,5)}} 
                </b>
                @php
                    $randomMinutes = rand(1, 10);
                    $time = strtotime($time);
                    // echo date('Y-m-d H:i:s',$time);
                    $time = date('Y-m-d H:i:s',strtotime("-$randomMinutes minutes", $time));
                    $prevItem = $item->ip
                @endphp
                <br>
            </div>
        @endif
    @endforeach

    <script>
        setTimeout(function() {
            window.location.href = '{{ route('testt.show') }}';
        }, 10000); // 2000 milliseconds = 2 seconds
    </script>
</div>
</body>
</html>