<div class="container">
    <h1>Análise de Sentimentos</h1>

    <div class="mb-3">
        <textarea wire:model="texto" placeholder="Digite algo aqui..." class="form-control"></textarea>
    </div>

    <button wire:click="analisarSentimento" class="btn btn-primary">Analisar</button>

    <div class="resultados mt-4 p-3" style="display: @if(count($resultados) > 0) block @else none @endif">
        <h3>Resultados:</h3>
        <ul>
            @foreach ($resultados as $resultado)
                <li><strong>{{ $resultado['label'] }}:</strong> {{ round($resultado['score'], 4) }}</li>
            @endforeach
        </ul>
    </div>
</div>
