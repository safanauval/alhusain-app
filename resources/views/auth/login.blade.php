@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <!-- Login CSS -->
    <link rel="stylesheet" href="{{ asset('..\css\login.css') }}">

    <!-- Cek error -->
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Form Login -->
    <form class="container" method="POST" action="{{ route('login') }}">
        @csrf
        <h4 class="text-center">SILAHKAN LOGIN!</h4>
        <hr class="border border-black border-2 opacity-100" />
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" required />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required />
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection