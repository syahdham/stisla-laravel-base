@extends('layouts.app')

@section('title', 'Hak Akses')

@section('content')

    <x-page-form title="Hak Akses">
        <form id="form_id" action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <x-form-input label="Nama" type="text" required="required" name="name"/>
        </form>
    </x-page-form>

@endsection
