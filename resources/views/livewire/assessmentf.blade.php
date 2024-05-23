<div>
    @php
   
        $linkuser = request()->input('user');

    @endphp

    @foreach($mycoletion as $user)
    <h5>Para: <b>{{ base64_decode($user->name) }} </h5></b>
        <form action="" wire:change="onmychange($linkuser)">
            @csrf
            <input type="text" wire:model="whodid" value="{{$linkuser}}" >
            Quem Receberá:<input type="text" wire:model="whoreceive" >
            Pontos Positivo:<input type="text" wire:model="strength" >
            Pontos a melhorar:<input type="text" wire:model="toworkon">
            obs:<input type="text" wire:model="obs">
        </form>
        <br>
    @endforeach
   

</div>


