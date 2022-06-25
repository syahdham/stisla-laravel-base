@extends('layouts.app')

@section('title', 'Hak Akses')

@section('content')

    <x-page-form title="Hak Akses" page="Ubah">
        <form id="form_id" action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @method('PUT')
            @csrf
            <x-form-input label="Nama" type="text" required="required" name="name" value="{{ $permission->name }}"/>
        </form>
    </x-page-form>

@endsection
