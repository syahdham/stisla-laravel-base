@extends('layouts.app')

@section('title', 'Hak Akses')

@section('content')

    <x-page-index
        title="Hak Akses"
        :dataTable="$dataTable"
        buttonLabel="Tambah Hak Akses"
        routeCreate="permissions.create"
    />

@endsection
