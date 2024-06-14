<div>

    checkelements:
    {{$whodid}}
    {{$whoreceive}}
    {{$passintern}}
    {{$strength}}
    {{$toworkon}}
    {{$obs}}



    @foreach($mycoletion as $user)
        @if ($user->whoreceive <> $this->whoreceive)
         <!-- {{$user->id }}   -->
        <a href="{{ route('asssessment.show', ['i' => $whodid, 'k' => $passintern, 'w' => $user->whoreceive ]) }}" class='btn btn-primary'>{{ base64_decode($user->name) }}</a>
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
    @endif
   

</div>


