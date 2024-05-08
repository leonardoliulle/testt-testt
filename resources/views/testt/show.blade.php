
<body>
<br>
<div class='container'>
    Mensagens: <br><br>

    @php $prevItem = null; $side = 'left' @endphp 
    @foreach ($testt as $item)
        @if ($prevItem !== null && $prevItem !== $item->ip)
            {{-- Change side --}}
            @php $side = ($side == 'left') ? 'right' : 'left'; @endphp
        @endif

        <div align='{{$side}}'>
c
            {{ $item->msg}}
            <br><b style='font-size: 8px;'>
                Quando: {{ $item->created_at}}
                Quem: {{ $item->ip}}
            </b>
            {{$prevItem = $item->ip}}
            <br>
        </div>
            @endforeach
</div>
</body>
</html>