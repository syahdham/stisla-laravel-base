@extends('layouts.app')

@section('title', 'Jabatan')

@section('content')

    <x-page-index
        title="Jabatan"
        :dataTable="$dataTable"
        buttonLabel="Tambah Jabatan"
        routeCreate="roles.create"
    />

@endsection
