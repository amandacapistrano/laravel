<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author', 'content', 'sentiment_score'];

    
    protected static function booted()
    {
        static::created(function ($comment) {
            // Chamar a API do Hugging Face para analisar o sentimento
            //$comment->sentiment_score = app('\SentimentAnalysis')->analyze($comment->content);
            $comment->save();
        });
    }

}
