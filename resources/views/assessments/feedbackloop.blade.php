<!-- <a href="{{route('assessment.getin')}}" class='btn btn-danger' style='align:right;'>Sair do grupo</a> -->
<div class='container'>


    @foreach($mycoletion as $user)

        @if (!empty($user->checktrue) and !empty($user->strength) and !empty($user->toworkon))
        <a href="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($user->whoreceive) ]) }}" class='btn btn-success'>{{ $user->name }}</a>
        @elseif ($user->whoreceive <> $whoreceive)
        <a href="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($user->whoreceive) ]) }}" class='btn btn-danger'>{{ $user->name }}</a>
        @else
        <b><a href="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($user->whoreceive) ]) }}" class='btn btn-default '>{{ $user->name }}</a></b>
        @endif

    @endforeach

        <br><br>
    

    @if (!empty($whoreceive) and $whoreceive <> '')
    <form method='post' action="{{ route('assessment.feedbackloop', ['i' => base64_encode($whodid), 'k' => base64_encode($passintern), 'w' => base64_encode($whoreceive) ])  }}" >
        @csrf
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
    </form>
    @else
    <div>Selecione alguém acima para seguir</div>
    <script>
        setTimeout(function() {
            location.reload();
        }, 5000); // 5 seconds
    </script>
    @endif





    <br><hr><br>
    @if ($denominador != 0) 
        <h1> {{ $numerador }} / {{ $denominador }} ({{round($numerador/$denominador,3)*100}}%) feitos</h1>
    @endif

    @if (!empty($myresults))
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


