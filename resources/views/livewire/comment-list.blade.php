<div>
    <h2>Comentários</h2>
    <p>Média de Sentimentos: {{ round($averageScore, 2) }}</p>

    <ul>
        @foreach($comments as $comment)
            <li>
                <strong>{{ $comment->author ?? 'Anônimo' }}</strong>: 
                {{ $comment->content }} 
                (Sentimento: {{ $comment->sentiment_score ?? 'Não Analisado' }})
            </li>
        @endforeach
    </ul>
</div>
