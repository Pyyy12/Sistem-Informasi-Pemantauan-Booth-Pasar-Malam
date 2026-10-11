@extends('layouts.market')
@section('title','Masuk')
@section('content')
<div class="row justify-content-center py-4"><div class="col-md-6 col-lg-5"><div class="panel p-4 p-md-5"><div class="text-center mb-4"><div class="brand-mark mx-auto mb-3"><i class="bi bi-stars"></i></div><h1 class="h3 fw-bold">Selamat datang</h1><p class="muted">Masuk untuk mengelola pasar malam.</p></div>
<form method="POST" action="{{ route('login') }}">@csrf
<div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"></div>
<div class="mb-3"><label class="form-label">Password</label><input class="form-control" type="password" name="password" required autocomplete="current-password"></div>
<div class="d-flex justify-content-between align-items-center mb-4"><label class="form-check"><input class="form-check-input" type="checkbox" name="remember"><span class="form-check-label">Ingat saya</span></label>@if(Route::has('password.request'))<a class="small" href="{{ route('password.request') }}">Lupa password?</a>@endif</div>
<button class="btn btn-brand w-100 py-2">Masuk</button></form>
@if(Route::has('register'))<p class="text-center muted mt-4 mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>@endif
</div></div></div>
@endsection
