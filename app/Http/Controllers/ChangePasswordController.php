<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\ChangePasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(ChangePasswordRequest $request)
    {
        try {
            auth()->user()->update($request->validated());

            return redirect()->route('profile.edit', auth()->id())->with('success', 'Password berhasil diubah');

        } catch (\Throwable $th) {
            return redirect()->route('profile.edit', auth()->id())->with('error', $th->getMessage());
        }
    }
}
