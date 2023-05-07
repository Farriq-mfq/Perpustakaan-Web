<?php

namespace App\Http\Livewire;

use App\Exports\UsersExport;
use App\Models\Anggota;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Maatwebsite\Excel\Facades\Excel;
class AnggotaTable extends DataTableComponent
{
    protected $model = Anggota::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nama", "nama")
                ->sortable()
                ->searchable()
                ,
            Column::make("Username", "username")
                ->sortable()
                ->searchable()
                ,
            Column::make("Email", "email")
                ->sortable()
                ->searchable()
                ,
            BooleanColumn::make('Status','status')
            ->sortable()
            ,
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            ButtonGroupColumn::make('Actions')
            ->unclickable()->buttons([
                LinkColumn::make('Edit Link')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('anggota.edit',$row->id))
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
            'activate' => 'Active',
            'deactivate' => 'Disable',
            'export' => 'Export',
            'remove' => 'Hapus',
        ];
    }
    public function activate(){
        Anggota::whereIn('id', $this->getSelected())->update(['status' => 1]);
        $this->clearSelected();
        redirect()->route('anggota.index');
    }
    public function deactivate(){
        Anggota::whereIn('id', $this->getSelected())->update(['status' => 0]);
        $this->clearSelected();
        redirect()->route('anggota.index');

    }
    public function export()
    {
        $users = $this->getSelected();

        $this->clearSelected();
        
        return Excel::download(new UsersExport($users), 'anggota.xlsx');
    }
    public function remove()
    {
        Anggota::whereIn('id', $this->getSelected())->delete();
        $this->clearSelected();
        redirect()->route('anggota.index');
    }
}
