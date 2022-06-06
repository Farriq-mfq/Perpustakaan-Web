<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Rent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

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
            // Column::make("Id", "id")
            //     ->sortable(),
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
            Column::make("Status", "status"),
            Column::make("Denda", "denda")
                ->sortable(),
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
}
