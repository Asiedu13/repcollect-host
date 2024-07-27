<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('RepCollect | Link Generator')]
class GenerateLink extends Component
{
    public $link;


    public function mount()
    {
        $this->link = request()->segment(3);
    }

    public function proceed()
    {
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.generate-link')->layout('components.layouts.app', ['currentUser' => User::where('id', auth()->id())->get()]);
    }
}
