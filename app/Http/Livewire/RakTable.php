<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Rak;

class RakTable extends DataTableComponent
{
    protected $model = Rak::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable()
                ,
            Column::make("Kode rak", "kode_rak")
                ->sortable()->searchable(),
            Column::make("Lokasi rak", "lokasi_rak")
                ->sortable()->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
                ButtonGroupColumn::make('Actions')
                ->unclickable()->buttons([
                    LinkColumn::make('My Link 2')
                            ->title(fn($row) => 'Edit')
                            ->location(fn($row) => route('rak.edit',$row->id))
                            ->attributes(function($row) {
                                return [
                                    'class' => 'btn btn-primary',
                                ];
                            }),
                ])
        ];
    }
    public function bulkActions(): array
    {
        return [
            'remove' => 'Hapus',
        ];
    }
    public function remove()
    {
        Rak::whereIn('id', $this->getSelected())->delete();
        $this->clearSelected();
        redirect()->route('rak.index');
    }
}
