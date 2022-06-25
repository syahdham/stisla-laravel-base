@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')

    <x-page-index
        title="Pengguna"
        :dataTable="$dataTable"
        buttonLabel="Tambah Pengguna"
        routeCreate="users.create"
    />

@endsection
