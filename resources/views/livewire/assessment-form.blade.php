<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
<!-- resources/views/livewire/assessment-form.blade.php -->


@php
    // dd($users);
@endphp


<div class="container">
    @foreach ($users as $user)
    <form wire:submit.prevent="submit">
            <input type="text" wire:model="whodid" id="whodid" value='{{ $request->input('user')}}' hidden>
            <label for="whoreceive">Quem vai receber: <b>{{ base64_decode($user->name)}}</b></label><br>
            <input type="text" wire:model="whoreceive" id="whoreceive" value="{{ $user->towho }}" hidden>
            <label for="strength">Força:</label>
            <input type="text" wire:model="strength" id="strength">
            <label for="toworkon">Para melhorá:</label>
            <input type="text" wire:model="toworkon" id="toworkon"><br>
            <label for="obs" >Observações:</label>
            <textarea wire:model="obs" id="obs" class="form-control form"></textarea>
        <button type="submit" >Lançar</button><br><br>    
    </form>
    @endforeach
</div>
