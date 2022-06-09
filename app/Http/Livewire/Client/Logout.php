<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Logout extends Component
{
    public function handleLogout()
    {
        auth()->guard('anggota')->logout();
        return redirect()->route('client.login');
    }
    public function render()
    {
        return view('livewire.client.logout');
    }
}
