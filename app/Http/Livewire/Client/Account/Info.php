<?php

namespace App\Http\Livewire\Client\Account;

use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Info extends Component
{
    use WithFileUploads;
    public $nama;
    public $username;
    public $email;
    public $profile;
    public $password;
    public $new_pass;
    public $alert = [];
    public function changeNama()
    {   
        $this->validate([
            'nama'=>'required|min:6',
        ]);
        Anggota::find(auth()->guard('anggota')->user()->id)->update([
            'nama'=>$this->nama
        ]);

    }
    public function changeUsername()
    {   
        $this->validate([
            'username'=>'required|min:6|unique:users,username',
        ]);
        Anggota::find(auth()->guard('anggota')->user()->id)->update([
            'username'=>$this->username
        ]);

    }
    public function changeEmail()
    {   
        $this->validate([
            'email'=>'required|email|unique:users,email',
        ]);
        Anggota::find(auth()->guard('anggota')->user()->id)->update([
            'email'=>$this->email
        ]);

    }
    public function changeProfile()
    {
        $this->validate([
            'profile'=>"required|mimes:jpg,png,jpeg|max:2048"
        ]);
        $profile = md5($this->profile.microtime()).".".$this->profile->extension();
        if(auth()->guard('anggota')->user()->profile_picture != null){
            unlink(storage_path().'/app/public/profile/'.auth()->guard('anggota')->user()->profile_picture);
            $update = Anggota::find(auth()->guard('anggota')->user()->id)->update([
                'profile_picture'=>$profile
            ]);
            if($update){
                $this->profile->storePubliclyAs('profile',$profile,'public');
            }
        }else{
            $update = Anggota::find(auth()->guard('anggota')->user()->id)->update([
                'profile_picture'=>$profile
            ]);
            if($update){
                $this->profile->storePubliclyAs('profile',$profile,'public');
            }
        }
    }
    public function changePassword()
    {
        $this->validate([
            'password'=>'required|min:5',
            'new_pass'=>'required|min:5'
        ]);
        if(Hash::check($this->password,auth()->guard('anggota')->user()->password)){
            $update = Anggota::find(auth()->guard('anggota')->user()->id)->update([
                'password'=>Hash::make($this->new_pass)
            ]);
            if($update){
                $this->reset(['password','new_pass']);
                $this->alert = ['type'=>'success','message'=>'Berhasil mengubah password'];
            }else{
                $this->alert = ['type'=>'danger','message'=>'gagal mengubah password'];
            }
        }else{
            $this->alert = ['type'=>'danger','message'=>'Invalid Password'];
        }
    }
    public function mount()
    {
        $this->nama = auth()->guard('anggota')->user()->nama;
        $this->username = auth()->guard('anggota')->user()->username;
        $this->email =  auth()->guard('anggota')->user()->email;
    }
    public function render()
    {
        return view('livewire.client.account.info')->extends('layouts.client',['title'=>'Info Akun saya'])->section("clientContent");
    }
}
