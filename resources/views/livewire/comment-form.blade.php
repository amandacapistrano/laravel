<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model="author" placeholder="Seu nome (opcional)" />
        <textarea wire:model="content" placeholder="Digite seu comentário"></textarea>
        <button type="submit">Adicionar Comentário</button>
        
    </form>
    @if (session()->has('message'))
        <p>{{ session('message') }}</p>
    @endif
</div>
