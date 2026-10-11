@extends('layouts.market')
@section('title','Catat Aktivitas')
@section('content')
@include('partials.nav')
<div class="panel p-4 mx-auto" style="max-width:850px"><h1 class="h3 fw-bold mb-4">Edit aktivitas wahana</h1>
<form method="POST" action="{{ route('activities.update',$activity) }}">@csrf @if('PUT'==='PUT') @method('PUT') @endif
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Wahana *</label><select class="form-select" name="wahana_id" required><option value="">Pilih wahana</option>@foreach($wahana as $w)<option value="{{ $w->id }}" @selected(old('wahana_id',$activity->wahana_id)==$w->id)>{{ $w->name }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Tanggal *</label><input type="date" class="form-control" name="activity_date" required value="{{ old('activity_date',$activity->activity_date?->format('Y-m-d') ?? now()->toDateString()) }}"></div>
<div class="col-md-4"><label class="form-label">Status *</label><select class="form-select" name="status" required>@foreach(['active'=>'Aktif','inactive'=>'Tidak aktif','maintenance'=>'Perawatan','finished'=>'Selesai'] as $k=>$v)<option value="{{ $k }}" @selected(old('status',$activity->status ?: 'active')===$k)>{{ $v }}</option>@endforeach</select></div>
<div class="col-md-4"><label class="form-label">Jumlah pengunjung *</label><input type="number" min="0" class="form-control" name="visitor_count" required value="{{ old('visitor_count',$activity->visitor_count ?? 0) }}"></div>
<div class="col-md-4"><label class="form-label">Pemasukan wahana (Rp) *</label><input type="number" min="0" step="1000" class="form-control" name="income" required value="{{ old('income',$activity->income ?? 0) }}"></div>
<div class="col-12"><label class="form-label">Catatan</label><textarea class="form-control" name="notes" rows="3">{{ old('notes',$activity->notes) }}</textarea></div>
</div><div class="mt-4 d-flex gap-2"><button class="btn btn-brand">Simpan</button><a class="btn btn-light" href="{{ route('activities.index') }}">Batal</a></div></form></div>
@endsection
