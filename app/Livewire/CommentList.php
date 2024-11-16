<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentList extends Component
{
    public $comments; // Armazena os comentários da base de dados
    public $averageScore = 0; // Média dos sentimentos

    public function mount()
    {
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = Comment::orderBy('created_at', 'desc')->get();
        $this->averageScore = $this->comments->avg('sentiment_score') ?? 0; // Calcula a média
    }

    public function render()
    {
        return view('livewire.comment-list');
    }
}
