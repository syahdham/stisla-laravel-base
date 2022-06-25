<?php

namespace App\Http\Controllers;

use DB;
use Gate;
use App\Models\Permission;
use App\DataTables\PermissionDataTable;
use App\Http\Requests\PermissionRequest;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    private $path;
    /**
     * PermissionController constructor.
     */
    public function __construct()
    {
        $this->path = 'pages.permission.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionDataTable $dataTable)
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $dataTable->render($this->path.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view($this->path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRequest $request)
    {
        DB::beginTransaction();

        try {
            Permission::create($request->validated());

            DB::commit();

            return redirect()->route('permissions.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('permissions.index')->with('error', 'Terdapat eror server');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view($this->path.'edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PermissionRequest  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        DB::beginTransaction();

        try {
            $permission->update($request->validated());

            DB::commit();

            return redirect()->route('permissions.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('permissions.index')->with('error', 'Terdapat eror server');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();

        try {
            $permission->delete();

            DB::commit();

            return redirect()->route('permissions.index')->with('success', 'Data berhasil dihapus');

        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('permissions.index')->with('error', 'Terdapat eror server');
        }
    }
}
