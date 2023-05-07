<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $error;
    public function handleLogin()
    {
        $this->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $credentials = ['email'=>$this->email,'password'=>$this->password];
        if(auth()->guard('admin')->attempt($credentials)){
            return redirect()->route("home.index");
        }else{
            $this->error = "Invalid Email Atau Password";
        }
        
    }
    public function render()
    {
        // dd(Hash::make('admin'));
        return view('livewire.auth.login')->extends("layouts.auth",['title'=>"Login to Dashboard"])->section('authContent');
    }
}
