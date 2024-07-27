<?php

namespace App\Livewire;

use App\Models\Link;
use App\Models\User;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\Title;

class IndividualCollection extends Component
{
    public $theOne;
    public $transactionsSum;
    public $transactions;
    public $nOfPaymentsAtBase;
    public $otherCollections;

    public function mount()
    {
        $link = request()->segment(2);
        
        // The current collection
        $this->theOne = Link::where('link', $link)->first()->focus;
        $this->theOne->link = $this->theOne->link->link;

        $focus_id = $this->theOne->id;

        $this->transactions = Transaction::where('focus_id', $focus_id)->get()->reverse();

        $this->transactionsSum = Transaction::where('focus_id', $focus_id)->sum('amount_paid');

        $this->nOfPaymentsAtBase = floor(($this->theOne->desired_amount - $this->transactionsSum) / $this->theOne->cost);

        // Other collections section
        $numberToTake = User::find(auth()->id())->focus->count() > 4 ? 3 : User::find(auth()->id())->focus->count() - 1;
        

        $this->otherCollections = User::find(auth()->id())->focus->where('id', '!=', $focus_id)->take($numberToTake);

        // Add extra attributes to it
        foreach ($this->otherCollections as $collection) {
            $collection->sum = $collection->transactions->sum('amount_paid');
            $collection->link = $collection->link->link;
        }
    }
    #[Title("RepCollect | Collection")]
    public function render()
    {
        return view('livewire.individual-collection')->layout('components.layouts.admin-collection');
    }
}
