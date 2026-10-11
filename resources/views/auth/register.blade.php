@extends('layouts.market')
@section('title','Daftar Akun')
@section('content')
<div class="row justify-content-center py-4"><div class="col-md-6 col-lg-5"><div class="panel p-4 p-md-5"><h1 class="h3 fw-bold mb-1">Buat akun</h1><p class="muted mb-4">Daftarkan akun untuk masuk ke sistem.</p>
<form method="POST" action="{{ route('register') }}">@csrf
<div class="mb-3"><label class="form-label">Nama</label><input class="form-control" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"></div>
<div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"></div>
<div class="mb-3"><label class="form-label">Password</label><input class="form-control" type="password" name="password" required autocomplete="new-password"></div>
<div class="mb-4"><label class="form-label">Konfirmasi password</label><input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password"></div>
<button class="btn btn-brand w-100">Daftar</button></form><p class="text-center muted mt-4 mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
</div></div></div>
@endsection
