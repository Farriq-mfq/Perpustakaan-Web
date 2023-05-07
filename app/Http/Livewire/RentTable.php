<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Rent;
use Carbon\Carbon;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class RentTable extends DataTableComponent
{
    protected $model = Rent::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Kode Pinjam",'kode_pinjam')
            ->sortable()
            ->searchable()
            ,
            Column::make("Judul Buku",'judul_buku')
            ->sortable()
            ->searchable()
            ,
            Column::make("Peminjam",'peminjam')
            ->searchable()
            ->sortable(),
            Column::make("Tanggal Pinjam", "tanggal_pinjam")
                ->sortable(),
            Column::make("Tanggal Kembali", "tanggal_kembali")
                ->sortable(),
            Column::make("Status", "status")->sortable( ),
            BooleanColumn::make("Persetujuan", "persetujuan")->sortable(),
            Column::make("Denda", "denda")
                ->sortable(),
        ];
    }
    public function bulkActions():array
    {
        return [
            'accept' => 'Setujui',
            'reject' => 'Tolak',
            'export' => 'Export',
            'remove' => 'Hapus',
            'perpanjang' => 'Perpanjang',
            'kembali'=>"Dikembalikan",
            'lunas'=>"Lunas",

        ];
    }
    public function accept()
    {
        $dateTime = Carbon::now();
        Rent::whereIn('id', $this->getSelected())->update(['persetujuan' => 1,'tanggal_pinjam'=>$dateTime->toDateTimeString(),'tanggal_kembali'=>$dateTime->addDays(7)->toDateTimeString()]);
        $this->clearSelected();
        redirect()->route('rent.index');
    }
    public function reject()
    {
        Rent::whereIn('id', $this->getSelected())->update(['persetujuan' => 0]);
        $this->clearSelected();
        redirect()->route('rent.index');
    }
    public function remove()
    {
        Rent::whereIn('id', $this->getSelected())->delete();
        $this->clearSelected();
        redirect()->route('rent.index');
    }
    public function perpanjang()
    {
        $dateTime = Carbon::now();
        Rent::whereIn('id', $this->getSelected())->update(['tanggal_kembali' => $dateTime->addDays(7)->toDateTimeString(),'status'=>'pinjam']);
        $this->clearSelected();
        redirect()->route('rent.index');
    }
    public function kembali()
    {
        Rent::whereIn('id', $this->getSelected())->update(['status' => 'dikembalikan']);
        $this->clearSelected();
        redirect()->route('rent.index');
    }
    public function lunas()
    {
        Rent::whereIn('id', $this->getSelected())->update(['denda' =>0]);
        $this->clearSelected();
        redirect()->route('rent.index');
    }
}
