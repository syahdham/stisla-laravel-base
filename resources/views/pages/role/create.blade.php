@extends('layouts.app')

@section('title', 'Jabatan')

@section('content')

    <x-page-form title="Jabatan">
        <form id="form_id" action="{{ route('roles.store') }}" method="POST">
            @csrf
            <x-form-input label="Nama" type="text" required="required" name="name"/>
            <x-form-select-multiple label="Hak Akses" required="required" :values="$permissions" name="permissions" required="required" placeholder="Contoh: dashboard"/>
        </form>
    </x-page-form>

@endsection
