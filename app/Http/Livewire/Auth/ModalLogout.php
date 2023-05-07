<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class ModalLogout extends Component
{
    public function handleLogout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('auth.login');
    }
    public function render()
    {
        return view('livewire.auth.modal-logout');
    }
}
