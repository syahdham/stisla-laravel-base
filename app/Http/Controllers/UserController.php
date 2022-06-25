<?php

namespace App\Http\Controllers;

use DB;
use Gate;
use App\Models\Role;
use App\Models\User;
use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $path;
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->path = 'pages.user.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $dataTable->render($this->path.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::select('id', 'name')->get();
        return view($this->path.'create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = User::create($request->validated());
            $user->roles()->sync($request->roles);

            DB::commit();

            return redirect()->route('users.index')->with('success', 'Data berhasil disimpan');

        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('users.index')->with('error', 'Terdapat eror server');
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
     * @param  User  $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::select('id', 'name')->get();
        return view($this->path.'edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        DB::beginTransaction();

        try {

            $user->update($request->validated());
            $user->roles()->sync($request->input('roles', []));

            DB::commit();

            return redirect()->route('users.index')->with('success', 'Data berhasil diubah');

        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('users.index')->with('error', 'Terdapat eror server');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();

        try {
            $user->delete();

            DB::commit();

            return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');

        } catch (\Throwable $th) {

            DB::rollback();

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->route('users.index')->with('error', 'Terdapat eror server');
        }
    }
}
