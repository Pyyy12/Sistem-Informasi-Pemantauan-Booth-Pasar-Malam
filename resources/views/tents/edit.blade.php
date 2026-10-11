@extends('layouts.market')
@section('title','Edit Tenda')
@section('content')
@include('partials.nav')
<div class="panel p-4 mx-auto" style="max-width:950px"><h1 class="h3 fw-bold mb-1">Edit tenda</h1><p class="muted mb-4">Perbarui data tenda.</p><form method="POST" action="{{ route('tents.update',$tent) }}">@csrf @method('PUT') @include('tents.form')<div class="d-flex gap-2 mt-4"><button class="btn btn-brand">Simpan perubahan</button><a href="{{ route('tents.index') }}" class="btn btn-light">Batal</a></div></form></div>
@endsection
