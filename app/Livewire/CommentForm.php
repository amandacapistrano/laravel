<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentForm extends Component
{
    public $author;
    public $content;

    // Método de envio do formulário
    public function submit()
    {
        // Validação
        $this->validate([
            'content' => 'required|string|max:500', // Certifique-se de que o conteúdo não ultrapasse 500 caracteres
        ]);

        // Criar o comentário no banco
        Comment::create([
            'author' => $this->author ?? 'Anônimo', // Se o autor não for preenchido, será 'Anônimo'
            'content' => $this->content,
            'sentiment_score' => rand(0, 100) / 100, // Exemplo de pontuação de sentimento (substitua pelo seu modelo de análise de sentimento)
        ]);

        // Mensagem de sucesso
        session()->flash('message', 'Comentário adicionado com sucesso!');
        
        // Limpa os campos
        $this->reset(['author', 'content']);
        
        // Emitir evento para atualizar a lista de comentários
        $this->emit('commentAdded');
        
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
