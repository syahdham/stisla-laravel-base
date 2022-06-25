@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')

    <x-page-form title="Pengguna" page="Ubah">
        <form id="form_id" action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <x-form-input label="Nama" type="text" required="required" name="name" value="{{ $user->name }}"/>
            <x-form-input label="Email" type="email" required="required" name="email" value="{{ $user->email }}"/>
            <x-form-select-multiple label="Jabatan" required="required" :values="$roles" :selected="$user->roles" name="roles" required="required" placeholder="Contoh: Pengguna"/>
        </form>
    </x-page-form>

@endsection
