@extends('layouts.market')
@section('title','Edit Wahana')
@section('content')
@include('partials.nav')
<div class="panel p-4 mx-auto" style="max-width:850px"><h1 class="h3 fw-bold mb-4">Edit wahana</h1><form method="POST" action="{{ route('wahana.update',$item) }}">@csrf @if('PUT'==='PUT') @method('PUT') @endif
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Nama wahana *</label><input class="form-control" name="name" required value="{{ old('name',$item->name) }}"></div>
<div class="col-md-6"><label class="form-label">Nama operator</label><input class="form-control" name="operator_name" value="{{ old('operator_name',$item->operator_name) }}"></div>
<div class="col-md-6"><label class="form-label">Lokasi</label><input class="form-control" name="location" value="{{ old('location',$item->location) }}"></div>
<div class="col-md-6"><label class="form-label">Status *</label><select class="form-select" name="status" required>@foreach(['active'=>'Aktif','inactive'=>'Tidak aktif','maintenance'=>'Perawatan','finished'=>'Selesai'] as $k=>$v)<option value="{{ $k }}" @selected(old('status',$item->status ?: 'inactive')===$k)>{{ $v }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Jam buka</label><input type="time" class="form-control" name="opening_time" value="{{ old('opening_time',$item->opening_time ? substr($item->opening_time,0,5) : '') }}"></div>
<div class="col-md-6"><label class="form-label">Jam tutup</label><input type="time" class="form-control" name="closing_time" value="{{ old('closing_time',$item->closing_time ? substr($item->closing_time,0,5) : '') }}"></div>
<div class="col-12"><label class="form-label">Catatan</label><textarea class="form-control" name="notes" rows="3">{{ old('notes',$item->notes) }}</textarea></div>
</div><div class="mt-4 d-flex gap-2"><button class="btn btn-brand">Simpan</button><a class="btn btn-light" href="{{ route('wahana.index') }}">Batal</a></div></form></div>
@endsection
