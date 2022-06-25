<?php

namespace App\DataTables;

use App\Models\Role;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
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
            ->addColumn('permissions', function ($data) {
                return view('pages.role.column.permissions', compact('data'))->render();
            })
            ->addColumn('action', function ($data) {
                $route = 'roles';
                $showButton = false;
                return view('components.table-button', compact('route', 'data', 'showButton'))->render();
            })
            ->rawColumns(['permissions', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\System\Role $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        return $model->newQuery()->with('permissions');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('role-table')
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
            Column::make('permissions')->title('Hak Akses')->width(100),
            Column::make('action')
                ->exportable(false)
                ->printable(false)
                ->width(50)
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
        return 'Role_' . date('YmdHis');
    }
}
