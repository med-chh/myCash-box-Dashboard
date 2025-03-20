<?php

namespace App\Livewire\Items\Categories;
use Livewire\Attributes\Layout;


use Livewire\Component;

class CategoriesList extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.items.categories.categories-list');
    }
}
