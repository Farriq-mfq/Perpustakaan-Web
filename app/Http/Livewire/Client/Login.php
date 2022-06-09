<?php

namespace App\Http\Livewire\Client;

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
            'password'=>'required',
        ]);

        $credentials = ['email'=>$this->email,'password'=>$this->password];
        if(auth()->guard('anggota')->attempt($credentials)){
            return redirect()->route('client.index');
        }else{
            $this->error = "Invalid Email or Password";
        }
    }
    public function render()
    {
        return view('livewire.client.login')->extends('layouts.clientAuth')->section("clientContent");
    }
}
