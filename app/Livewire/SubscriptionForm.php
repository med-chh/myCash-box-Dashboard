<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

use Illuminate\Support\Facades\Auth;



class SubscriptionForm extends Component
{
    #[Layout('layouts.app')]
    public $planId;
    public $paddlePublicKey;

    public function mount()
    {
        $this->paddlePublicKey = config('cashier.paddle.public_key');
    }

    public function subscribe()
    {
        $user = Auth::user();

        try {
            $user->newSubscription('default', $this->planId)->create();
            session()->flash('message', 'Subscription successful!');
            return redirect()->route('your_dashboard_route');
        } catch (\Exception $e) {
            session()->flash('error', 'Subscription failed: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.subscription-form');
    }
}
