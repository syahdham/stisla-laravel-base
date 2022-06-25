@extends('layouts.app')

@section('title', 'Jabatan')

@section('content')

    <x-page-form title="Jabatan" page="Ubah">
        <form id="form_id" action="{{ route('roles.update', $role->id) }}" method="POST">
            @method('PUT')
            @csrf
            <x-form-input label="Nama" type="text" required="required" value="{{ $role->name }}" name="name"/>
            <x-form-select-multiple label="Hak Akses" required="required" :values="$permissions" :selected="$role->permissions" name="permissions" required="required" placeholder="Contoh: dashboard"/>
        </form>
    </x-page-form>

@endsection
