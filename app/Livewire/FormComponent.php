<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Annotation;

class FormComponent extends Component
{
    public $title = '';
    public $content = '';

    public function save()
    {
        Annotation::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->clearForm();
        session()->flash('message', 'Anotação salva com sucesso!');
    }

    public function clearForm()
    {
        $this->title = '';
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.form-component');
    }
}