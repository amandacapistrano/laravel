<div>
    <form wire:submit.prevent="save">
        <div>
            <label>Título:</label>
            <input type="text" wire:model="title">
        </div>
        <div>
            <label>Conteúdo:</label>
            <textarea wire:model="content"></textarea>
        </div>
        <button type="submit">Salvar</button>
        <button type="button" wire:click="clearForm">Limpar</button>
    </form>

    <h3>Saída:</h3>
    <p>{{ $title }}</p>
    <p>{{ $content }}</p>
</div>
