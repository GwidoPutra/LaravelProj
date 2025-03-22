<?php

namespace App\DataTables;

use App\Models\LevelModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LevelDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable 
    {
    return (new EloquentDataTable($query))
    ->addColumn('action', function ($level) {
        $btn = '<div class="d-flex gap-2">';
        $btn .= '<a href="/level/edit/' . $level->level_id . '" class="btn btn-sm btn-primary my-1">Edit</a>';
        $btn .= '<a href="/level/hapus/' . $level->level_id . '" class="btn btn-sm btn-danger my-1">Hapus</a>';
        $btn .= '</div>';
        return $btn;
    })
    ->setRowId('id');
}

    public function query(LevelModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('level-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('level_id')->title('Level ID'),
            Column::make('level_kode')->title('Level Kode'),
            Column::make('level_nama')->title('Level Nama'),
            Column::make('created_at')->title('Created At'),
            Column::make('updated_at')->title('Updated At'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-end')
        ];
    }

    protected function filename(): string
    {
        return 'Level_' . date('YmdHis');
    }
}