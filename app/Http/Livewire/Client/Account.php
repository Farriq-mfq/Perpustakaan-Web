<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Account extends Component
{
    public $count;
    function handleCount(){
        $this->count++;
    }
    public function render()
    {
        return view('livewire.client.account')->extends('layouts.client',['title'=>"Akun"])->section("clientContent");
    }
}
