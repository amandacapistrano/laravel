<?php

namespace App\Livewire;

use Livewire\Component;

class SentimentAnalysis extends Component
{
    public $texto = '';
    public $resultados = [];

    public function analisarSentimento()
    {
        $apiKey = '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'; // Chave da API
        $url = "https://api-inference.huggingface.co/models/nlptown/bert-base-multilingual-uncased-sentiment";

        // Dados para enviar à API
        $data = json_encode(["inputs" => $this->texto]);

        // Definições para a requisição HTTP
        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n" .
                            "Authorization: Bearer $apiKey\r\n",
                'method' => 'POST',
                'content' => $data,
            ],
        ];

        // Enviando a requisição
        $context = stream_context_create($options);
        $result = @file_get_contents($url, false, $context);

        if ($result !== FALSE) {
            $response = json_decode($result, true);
            if (isset($response[0])) {
                $this->resultados = $response[0];
            } else {
                $this->resultados = [['label' => 'Erro', 'score' => 0]];
            }
        } else {
            $this->resultados = [['label' => 'Erro', 'score' => 0]];
        }
    }

    public function render()
    {
        return view('livewire.sentiment-analysis');
    }
}
