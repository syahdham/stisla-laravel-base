@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <x-header-page title="Beranda, Halo {{ auth()->user()->name }}" class="pl-2"/>
    </section>
@endsection

@push('scripts')

@endpush
