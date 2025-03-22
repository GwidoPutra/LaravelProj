<?php

namespace App\DataTables;

use App\Models\BarangModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BarangDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($barang) {
                $btn = '<div class="d-flex gap-2">';
                $btn .= '<a href="/barang/edit/' . $barang->barang_id . '" class="btn btn-sm btn-primary my-1">Edit</a>';
                $btn .= '<a href="/barang/hapus/' . $barang->barang_id . '" class="btn btn-sm btn-danger my-1">Hapus</a>';
                $btn .= '</div>';
                return $btn;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BarangModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('barang-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip') //aktifkan ini jika button excel, csv, pdf dll ingin muncul
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

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('barang_id'), 
            Column::make('kategori_id')->title('Kategori'),
            Column::make('barang_kode')->title('Kode Barang'),
            Column::make('barang_nama')->title('Nama Barang'),
            Column::make('harga_beli')->title('Harga Beli'),
            Column::make('harga_jual')->title('Harga Jual'),
            Column::make('created_at')->title('Dibuat'),
            Column::make('updated_at')->title('Diperbarui'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Barang_' . date('YmdHis');
    }
}
