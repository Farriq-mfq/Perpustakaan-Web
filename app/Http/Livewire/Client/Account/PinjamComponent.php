<?php

namespace App\Http\Livewire\Client\Account;

use App\Models\Rent;
use Livewire\Component;

class PinjamComponent extends Component
{
    public $rent;
    public bool $show = false;
    public function Toggle()
    {
        $this->show ? $this->show = false : $this->show = true;
    }
    protected function getDays($date1,$date2)
    {
        $diff = strtotime($date2) - strtotime($date1);
        return (int) abs(round($diff / 86400));
    }
    public function handlebatal($id)
    {
        Rent::find($id)->delete();
        return redirect()->route('client.account.rent');
    }
    public function mount()
    {
        $hariTelat = $this->getDays(date("Y-m-d"),$this->rent->tanggal_kembali);
        if($this->rent->tanggal_kembali != null && $this->rent->tanggal_pinjam != null){
            if(Rent::where('anggota_id',auth()->guard('anggota')->user()->id)->where('book_id',$this->rent->book_id)->first()->status != 'dikembalikan'){
                if(strtotime(date("Y-m-d")) > strtotime($this->rent->tanggal_kembali)){
                    $hariTelat = $this->getDays(date("Y-m-d"),$this->rent->tanggal_kembali);
                    Rent::where('anggota_id',auth()->guard('anggota')->user()->id)->where('book_id',$this->rent->book_id)->update([
                        'status'=>"telat",
                        'denda'=>$hariTelat * 1000
                    ]);
                }else{
                    Rent::where('anggota_id',auth()->guard('anggota')->user()->id)->where('book_id',$this->rent->book_id)->update([
                        'status'=>"pinjam",
                        'denda'=>0
                    ]);
                }
        }
    }
    }
    public function render()
    {
        return view('livewire.client.account.pinjam-component');
    }
}
