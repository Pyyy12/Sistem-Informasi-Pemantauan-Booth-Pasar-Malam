@extends('layouts.market')
@section('title','Edit Penyewa')
@section('content')
@include('partials.nav')
<div class="panel p-4 mx-auto" style="max-width:850px"><h1 class="h3 fw-bold mb-1">Edit penyewa</h1><p class="muted mb-4">Perbarui informasi penyewa.</p>
<form method="POST" action="{{ route('tenants.update',$tenant) }}">@csrf @method('PUT') @include('tenants.form')<div class="d-flex gap-2 mt-4"><button class="btn btn-brand">Simpan perubahan</button><a href="{{ route('tenants.index') }}" class="btn btn-light">Batal</a></div></form></div>
@endsection
