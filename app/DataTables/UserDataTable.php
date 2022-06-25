<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('role', function ($data) {
                return view('pages.user.column.role', compact('data'))->render();
            })
            ->addColumn('action', function ($data) {
                $route = 'users';
                $showButton = false;
                return view('components.table-button', compact('route', 'data', 'showButton'))->render();
            })
            ->rawColumns(['role', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\System\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->with('roles');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('flrtip')
            ->orderBy(1)
            ->buttons([]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name')->title('Nama')->width(100),
            Column::make('email')->title('Email')->width(100),
            Column::make('role')->title('Jabatan')->width(100),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->title('Aksi'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
