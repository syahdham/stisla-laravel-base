<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ChangeProfileRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ChangeProfileRequest  $request
     * @param  User  $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ChangeProfileRequest $request, User $profile)
    {
        try {
            $profile->update($request->validated());

            return redirect()->back()->with('success', 'Email berhasil diubah');

        } catch (\Throwable $th) {

            $this->errorLog(\Route::getCurrentRoute()->getActionMethod(), get_class($this), $th->getMessage());

            return redirect()->back()->with('error', 'Terdapat eror server');
        }
    }

}
