<style type="text/css" media="screen">
    .btn_transp {
/*    background-color: rgba(0, 123, 255, 0.7); /* Blue background with 70% opacity */
    opacity: 0.4; /* Overall opacity of the button 
}   
</style>

<div class='container'>

    

    @foreach($mycoletion as $user)


        @if (!empty($user->checktrue) and !empty($user->strength) and !empty($user->toworkon) and $user->whoreceive == $whoreceive)
        <a href="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($user->whoreceive) ]) }}" class='btn btn-success'>Enviado para: {{ $user->name }}</a>
        @elseif (!empty($user->checktrue) and !empty($user->strength) and !empty($user->toworkon))
        <a href="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($user->whoreceive) ]) }}" class='btn btn-success btn_transp'>Enviado para: {{ $user->name }}</a>
        @elseif ($user->whoreceive != $whoreceive)
        <a href="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($user->whoreceive) ]) }}" class='btn btn-danger btn_transp'>{{ $user->name }}</a>
        @else
        <a href="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($user->whoreceive) ]) }}" class='btn btn-default '> <b>Enviar para: {{ $user->name }}</b></a>
        @endif

    @endforeach

        <br><br>
    

    @if (!empty($whoreceive) and $whoreceive <> '')
    <form id='myForm' method='post' action="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($whoreceive) ])  }}" >
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- De que: -->
        <input type="text" name='whodid' value='{{$whodid}}' hidden>
        <input type="text" name='passintern' value='{{$passintern}}' hidden>
        <input type="text" name='whoreceive' value='{{$whoreceive}}' hidden>
        
        <div class="row mb-3">
                <b class='col-sm-2'>Pontos Positivo:</b><input type="text" name='strength' class='col-sm-6' autocomplete='off' value='{{$strength}}'>
        </div>

        <div class="row mb-3">
            <b class='col-sm-2'>Pontos a melhorar:</b><input class='col-sm-6 form' type="text" value='{{$toworkon}}' name='toworkon' autocomplete='off'>
        </div>
        
        <b>obs:</b><input type="textarea" class='form-control form' name='obs' value='{{$obs}}' autocomplete='off'>
        <button class='btn btn-primary' type='submit'>Salvar</button>
        <button class='btn btn-primary' type='submit'>Sincronizar</button>
    </form>
    @else
    <div>Selecione alguém acima para seguir</div>
    <script>
        setTimeout(function() {
            location.reload();
        }, 5000); // 5 seconds
    </script>
    @endif

                         





    
    @if ($denominador != 0) 
        <h1> {{ $numerador }} / {{ $denominador }} ({{round($numerador/$denominador,3)*100}}%) Feitos</h1>
    @endif

    <br><hr><br>
    @if (!empty($myresults))
        <h1>O que pensam sobre mim:</h1>
        <div><b>Pontos Fortes: </b><br>
        @foreach ($myresults as $me)
            <li>{{$me['strength']}}</li>
        @endforeach
        </div>

        <div><b>Pontos a melhorar: </b><br>
        @foreach ($myresults as $me)
            <li>{{$me['toworkon']}}</li>
        @endforeach
        </div>
    
        <div><b>Obs:</b> <br>
        @foreach ($myresults as $me)
            <li>{{$me['obs']}}</li>
        @endforeach
        </div>
    @endif

</div>


