
<body>
<br>
<div class='container'>

    Mensagens: <br><br>

    @php echo request('pass') @endphp

    <form action="" method='POST'>
        @csrf
        <label for="senha">Senha:</label>
        <input class='form-control sm-6' type="text" value="" name='pass'/>
        <button type='submit' class='btn btn-danger' type='submit' value='Descriptografar'>Descriptografar</button>
    </form>




    @php $prevItem = null; $side = 'left' @endphp 
    
    @foreach ($testt as $item)
        @if ($prevItem !== null && $prevItem !== $item->ip)
            {{-- Change side --}}
            @php $side = ($side == 'left') ? 'right' : 'left'; @endphp
        @endif
        @if ($item->pass == request('pass')) 
            {{ $item->msg}}
            <br><b style='font-size: 8px;'>
                Quando: {{ $item->created_at}}
                Quem: {{{ $item->ip}}} 
            </b>
            {{$prevItem = $item->ip}}
        <br>
        @elseif (request('pass') == null)
            <div align='{{$side}}'>
                
                {{ Crypt::encryptString($item->msg)}}
                <br><b style='font-size: 8px;'>
                    Quando: {{ $item->created_at}}
                    Quem: {{{ $item->ip}}} 
                </b>
                {{$prevItem = $item->ip}}
                <br>
            </div>
        @endif
    @endforeach
</div>
</body>
</html>