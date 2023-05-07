<?php

namespace App\Http\Livewire;

use App\Exports\BookExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use App\Models\Book;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class BookTable extends DataTableComponent
{
    protected $model = Book::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Judul", "judul")
                ->sortable()->searchable(),
            Column::make("Stok", "stok")
                ->sortable(),
            BooleanColumn::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            ButtonGroupColumn::make('Actions')
            ->unclickable()->buttons([
                LinkColumn::make('Edit Link')
                        ->title(fn($row) => 'Details')
                        ->location(fn($row) => route('books.view',$row->id))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-info',
                            ];
                        }),
                LinkColumn::make('Edit Link')
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('books.edit',$row->id))
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
    public function activate()
    {
        Book::whereIn('id', $this->getSelected())->update(['status' => 1]);
        $this->clearSelected();
        redirect()->route('books.index');
    }
    public function deactivate()
    {
        Book::whereIn('id', $this->getSelected())->update(['status' => 0]);
        $this->clearSelected();
        redirect()->route('books.index');
    }
    public function export()
    {
        $books = $this->getSelected();
        $this->clearSelected();
        return Excel::download(new BookExport($books),'Books.xlsx');
    }
    public function remove()
    {
        foreach ($this->getSelected() as $id) {
            $cover = Book::find($id)->cover;
            if(file_exists(storage_path().'/app/public/cover/'.$cover)){
                unlink(storage_path().'/app/public/cover/'.$cover);
            }
        }
        Book::whereIn('id', $this->getSelected())->delete();
        $this->clearSelected();
        redirect()->route('books.index');
    }
}
