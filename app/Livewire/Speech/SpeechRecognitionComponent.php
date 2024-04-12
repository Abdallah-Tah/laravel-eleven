<?php

namespace App\Livewire\Speech;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class SpeechRecognitionComponent extends Component
{
    public $result = '';

    protected $listeners = ['resultReceived' => 'updateResult'];

    public function updateResult($text)
    {
        Log::info('Speech Result: ' . $text);
        $this->result = $text;
    }


    public function save()
    {
        Log::info('Speech Result: ' . $this->result);
        // Save the result to a database or storage
    }

    public function render()
    {
        return view('livewire.speech.speech-recognition-component');
    }
}
