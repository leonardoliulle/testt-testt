<div>

     <!-- checkelements: 
    {{$whodid}}
    {{$whoreceive}}
    {{$passintern}}
    {{$strength}}
    {{$toworkon}}
    {{$obs}}  -->

 
    
    @livewireStyles


    @foreach($mycoletion as $user)


        @if (!empty($user->checktrue) and !empty($user->strength) and !empty($user->toworkon))
        <a href="{{ route('asssessment.show', ['i' => $whodid, 'k' => $passintern, 'w' => $user->whoreceive ]) }}" class='btn btn-success'>{{ base64_decode($user->name) }}</a>
        @elseif ($user->whoreceive <> $this->whoreceive)
        <a href="{{ route('asssessment.show', ['i' => $whodid, 'k' => $passintern, 'w' => $user->whoreceive ]) }}" class='btn btn-danger'>{{ base64_decode($user->name) }}</a>
        @else
        <b><a href="{{ route('asssessment.show', ['i' => $whodid, 'k' => $passintern, 'w' => $user->whoreceive ]) }}" class='btn btn-default '>{{ base64_decode($user->name) }}</a></b>
        @endif

    @endforeach

        <br><br><br>
    
    @if (!empty($this->whoreceive))
    <form action="" wire:change="onmychange('{{ $whodid }}', '{{ $passintern }}', '{{ $this->whoreceive }}')">
        @csrf
        <!-- De que: -->
        <input type="text" wire:model="passintern" hidden>
        <input type="text" wire:model="whodid" hidden>
        <!-- Quem Receberá: -->
        <input type="text" wire:model="whoreceive" class='form-control form col-md-6' hidden>
        
        <div class="row mb-3">
                <b class='col-sm-2'>Pontos Positivo:</b><input type="text" class='col-sm-6' wire:model="strength" >
        </div>

        <div class="row mb-3">
            <b class='col-sm-2'>Pontos a melhorar:</b><input class='col-sm-6 form' type="text" wire:model="toworkon">
        </div>
        
        <br><b>obs:</b><input type="textarea" class='form-control form' wire:model="obs">
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
        }, 40000); // 10 seconds
    </script>



    <br><hr><br>
    @if ($denominador != 0) 
        <h1> {{ $numerador }} / {{ $denominador }} ({{round($numerador/$denominador,3)*100}}%) feitos</h1>
    @endif

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
    @livewireScripts

</div>


