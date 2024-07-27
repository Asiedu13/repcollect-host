<?php

namespace App\Livewire;

use Livewire\Component;

class CollectionDisplay extends Component
{
    public $color;
    public $type;
    public $items;
    public $svg;

    public function render()
    {
        return view('livewire.collection-display');
    }
}
