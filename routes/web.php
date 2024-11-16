<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\HomeComponent;
use App\Livewire\SentimentAnalysis;

Route::get('/sentiment', SentimentAnalysis::class);

Route::get('/', HomeComponent::class);
 
