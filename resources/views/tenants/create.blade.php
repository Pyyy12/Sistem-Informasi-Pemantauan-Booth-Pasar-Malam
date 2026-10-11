@extends('layouts.market')
@section('title','Tambah Penyewa')
@section('content')
@include('partials.nav')
<div class="panel p-4 mx-auto" style="max-width:850px"><h1 class="h3 fw-bold mb-1">Tambah penyewa</h1><p class="muted mb-4">Isi data penyewa di bawah ini.</p>
<form method="POST" action="{{ route('tenants.store') }}">@csrf @include('tenants.form')<div class="d-flex gap-2 mt-4"><button class="btn btn-brand">Simpan data</button><a href="{{ route('tenants.index') }}" class="btn btn-light">Batal</a></div></form></div>
@endsection
