<?php

namespace App\Livewire\Settings\Profile;
use Livewire\Attributes\Layout;


use Livewire\Component;

class Profile extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.settings.profile.profile');
    }
}
