<div>

     <!-- checkelements: 
    {{$whodid}}
    {{$whoreceive}}
    {{$passintern}}
    {{$strength}}
    {{$toworkon}}
    {{$obs}}  -->



    @foreach($mycoletion as $user)
   
        @if (!empty($user->whoreceive) and !empty($user->strength) and !empty($user->toworkon))
        <a href="{{ route('asssessment.show', ['i' => $whodid, 'k' => $passintern, 'w' => $user->whoreceive ]) }}" class='btn btn-success'>{{ base64_decode($user->name) }}</a>
        @elseif ($user->whoreceive <> $this->whoreceive)
        <a href="{{ route('asssessment.show', ['i' => $whodid, 'k' => $passintern, 'w' => $user->whoreceive ]) }}" class='btn btn-danger'>{{ base64_decode($user->name) }}</a>
        @else
        <a href="{{ route('asssessment.show', ['i' => $whodid, 'k' => $passintern, 'w' => $user->whoreceive ]) }}" class='btn btn-default'>{{ base64_decode($user->name) }}</a>
        @endif
    @endforeach

        <br><br><br>
    @if (!empty($this->whoreceive))
    <form action="" wire:change="onmychange('{{ $whodid }}', '{{ $passintern }}', '{{ $this->whoreceive }}')">
        @csrf
        <!-- De que: -->
        <input type="text" wire:model="whodid" hidden>
        <!-- Quem Receberá: -->
        <input type="text" wire:model="whoreceive" hidden>
        Pontos Positivo:<input type="text" wire:model="strength" >
        Pontos a melhorar:<input type="text" wire:model="toworkon">
        obs:<input type="text" wire:model="obs">
    </form>
    @else
    <div>Selecione alguém acima para seguir</div>
    <script>
        setTimeout(function() {
            location.reload();
        }, 5000); // 5 seconds
    </script>
    @endif

    <script>
        setTimeout(function() {
            location.reload();
        }, 10000); // 10 seconds
    </script>
    <br><hr><br>
    <div><b>Pontos Fortes: </b><br>
    @foreach ($this->myresults as $me)
        <li>{{$me['strength']}}</li>
    @endforeach
    </div>

    <div><b>Pontos a melhorar: </b><br>
    @foreach ($this->myresults as $me)
        <li>{{$me['toworkon']}}</li>
    @endforeach
    </div>
   
    <div><b>Obs:</b> <br>
    @foreach ($this->myresults as $me)
        <li>{{$me['obs']}}</li>
    @endforeach
    </div>

</div>


