<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class AccountPage extends Component
{
    public $user;

    public function mount():void
    {
        $this->user = Auth::user();
    }

    public function getOrdersProperty()
    {
        return $this->user->orders;
    }

    public function render(): View
    {
        return view('livewire.pages.account');
    }
}