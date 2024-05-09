<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
<!-- resources/views/livewire/assessment-form.blade.php -->


@php
    $user = request('user');
@endphp


<div class="container">
    <form wire:submit.prevent="submit">
        <div>
            <label for="whodid">Who Did:
            <input type="text" wire:model="whodid" id="whodid" value='{{ $user }}' hidden>
        </div>

        <div>
            <label for="whoreceive">Who Receive:</label>
            <input type="text" wire:model="whoreceive" id="whoreceive">
        </div>

        <div>
            <label for="strength">Strength:</label>
            <input type="text" wire:model="strength" id="strength">
        </div>

        <div>
            <label for="toworkon">To Work On:</label>
            <input type="text" wire:model="toworkon" id="toworkon">
        </div>

        <div>
            <label for="obs">Observation:</label>
            <textarea wire:model="obs" id="obs"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
