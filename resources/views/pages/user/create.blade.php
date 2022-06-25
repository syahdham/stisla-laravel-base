@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')

    <x-page-form title="Pengguna">
        <form id="form_id" action="{{ route('users.store') }}" method="POST">
            @csrf
            <x-form-input label="Nama" type="text" required="required" name="name"/>
            <x-form-input label="Email" type="email" required="required" name="email"/>
            <x-form-input label="Kata Sandi" type="password" required="required" name="password"/>
            <x-form-input label="Konfirmasi Kata Sandi" type="password" required="required" name="password_confirmation"/>
            <x-form-select-multiple label="Jabatan" required="required" :values="$roles" name="roles" required="required" placeholder="Contoh: Pengguna"/>
        </form>
    </x-page-form>

@endsection
