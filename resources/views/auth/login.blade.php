@extends('layouts.auth')

@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Login</h4></div>

        <div class="card-body">
            @if(\Session::has('error'))
                <div class="alert alert-danger">
                    <span>{!! \Session::get('error') !!}</span>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <x-auth-input type="email" name="email" label="Email" placeholder="Email Address" required="required"
                              value="john@doe.com"/>
                <x-auth-input type="password" name="password" label="Password" placeholder="Password"
                              required="required" value="password"/>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
