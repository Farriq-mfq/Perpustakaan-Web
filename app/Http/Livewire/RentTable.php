<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Rent;
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
            'remove ' => 'Hapus',
        ];
    }
    public function accept()
    {
        Rent::whereIn('id', $this->getSelected())->update(['persetujuan' => 1]);
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
}
