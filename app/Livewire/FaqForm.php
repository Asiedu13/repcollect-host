<?php

namespace App\Livewire;

use App\Models\Faq;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FaqForm extends Component
{
    #[Validate('required', message:"A question is needed...yk")]
    public $question;

    public function sendQuestion()
    {
        $this->validate();
        $newQuestion = Faq::create([
            'user_id' => auth()->id(),
            'question' => $this->question,
        ]);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.faq-form');
    }
}
