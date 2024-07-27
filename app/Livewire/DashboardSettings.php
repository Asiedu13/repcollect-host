<?php

namespace App\Livewire;

use Exception;
use App\Models\User;
use App\Models\Saying;
use Livewire\Component;
use Livewire\Attributes\Title;

class DashboardSettings extends Component
{
    public $saying;

    public $view = 'settings';
    
    public function mount() 
    {
        try {
            $this->saying = Saying::findOrFail(rand(1, Saying::all()->count()));
            // dd($this->saying);

        }catch(Exception $e) {
        //  $this->saying = 'Nothing to say about money today';   
        }
    }
    #[Title('RepCollect | Settings')]
    public function render()
    {
        return view('livewire.dashboard-settings')->layout('components.layouts.dashboard-layout',
         [
            'user' => User::where('id', auth()->id())->get(), 
            'saying' => $this->saying,
            'view' => $this->view,
        ]);
    }
}
