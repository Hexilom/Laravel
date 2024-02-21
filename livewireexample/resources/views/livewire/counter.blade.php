<div>
   <input type="text" wire:model="note" />
   <button wire:click="store">Save Note</button>
   <p style="color:blueviolet">{{ $feedback }}</p>
    @foreach($notes as $note)
        <p>{{ $note->content }} 
        <button wire:click="update('{{ $note->id }}')">editar</button>
        <button wire:click="destroy('{{ $note->id }}')">Borrar</button></p>
    @endforeach
</div>
