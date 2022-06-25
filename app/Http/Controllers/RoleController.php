<?php

namespace App\Http\Controllers;

use DB;
use Gate;
use App\Models\Role;
use App\Models\Permission;
use App\DataTables\RoleDataTable;
use App\Http\Requests\RoleRequest;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    private $path;
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->path = 'pages.role.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(RoleDataTable $dataTable)
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $dataTable->render($this->path.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::select('id', 'name')->get();
        return view($this->path.'create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        DB::beginTransaction();

        try {

            $role = Role::create($request->all());
            $role->permissions()->sync($request->input('permissions', []));

            DB::commit();

            return redirect()->route('roles.index')->with('success', 'Data berhasil disimpan');

        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('roles.index')->with('error', 'Terdapat eror server');
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
     * @param  Role  $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::select('id', 'name')->get();

        $role->load('permissions');

        return view($this->path.'edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        DB::beginTransaction();

        try {
            $role->update($request->validated());
            $role->permissions()->sync($request->input('permissions', []));

            DB::commit();

            return redirect()->route('roles.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('roles.index')->with('error', 'Terdapat eror server');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();

        try {
            $role->delete();


            DB::commit();

            return redirect()->route('roles.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('roles.index')->with('error', 'Terdapat eror server');
        }
    }
}
