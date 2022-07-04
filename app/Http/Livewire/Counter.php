<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        return view('livewire.item', [
            "item" => Item::latest('id')->first()
        ]);
    }
}
