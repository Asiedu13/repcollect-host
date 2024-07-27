<?php

namespace App\Livewire;

use Exception;
use App\Models\User;
use App\Models\Saying;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\Title;


#[Title('RepCollect | Collections')]
class Dashboard extends Component
{
    // Data to display
    public $ongoing;
    public $completed;
    public $paused;

    public $transactions;

    // One crazy wise saying
    public $saying;

    public $view = 'collections';

    public $completedIcon = <<<'ICON'
        🎉 
    ICON;

     public $pausedIcon = <<<'ICON'
             ⏸️
    ICON;

     public $ongoingIcon = <<<'ICON'
            ☄️
    ICON;

    public function mount() 
    {
        try {
             $this->ongoing = User::find(auth()->id())->focus->where('status', 'ongoing')->reverse();
            
            $this->completed = User::find(auth()->id())->focus->where('status', 'completed')->reverse();
            
            $this->paused = User::find(auth()->id())->focus->where('status', 'paused')->reverse();
            
            $this->saying = Saying::findOrFail(rand(1, Saying::all()->count()));

            foreach($this->ongoing as $item) {
                $item->sum = $item->transactions->sum('amount_paid');
                $item->payCount = $item->transactions->count();
            }
            
            foreach($this->completed as $item) {
                $item->sum = $item->transactions->sum('amount_paid');
                $item->payCount = $item->transactions->count();
            }

            foreach($this->paused as $item) {
                $item->sum = $item->transactions->sum('amount_paid');
                $item->payCount = $item->transactions->count();
            }

        }catch(Exception $e) {
        //  $this->saying = 'Nothing to say about money today';   
        }
    }

    public function render()
    {   
        return view('livewire.dashboard')->layout('components.layouts.dashboard-layout',
         [
            'user' => User::where('id', auth()->id())->get(), 
            'saying' => $this->saying,
            'view' => $this->view,
        ]);
    }
}