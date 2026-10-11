@extends('layouts.market')
@section('title','Catat Transaksi')
@section('content')
@include('partials.nav')
<div class="panel p-4 mx-auto" style="max-width:900px"><h1 class="h3 fw-bold mb-1">Catat transaksi</h1><p class="muted mb-4">Pilih jenis transaksi dengan benar agar laporan tidak menghitung ganda.</p>
<form method="POST" action="{{ route('payments.store') }}">@csrf @if('POST'==='PUT') @method('PUT') @endif
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Jenis transaksi *</label><select class="form-select" name="type" required><option value="rent" @selected(old('type',$payment->type ?: 'rent')==='rent')>Pembayaran sewa tenda</option><option value="operational" @selected(old('type',$payment->type)==='operational')>Pemasukan operasional tambahan</option></select></div>
<div class="col-md-6"><label class="form-label">Tanggal diterima *</label><input type="date" class="form-control" name="paid_at" required value="{{ old('paid_at',$payment->paid_at?->format('Y-m-d') ?? now()->toDateString()) }}"></div>
<div class="col-md-6"><label class="form-label">Tenda (opsional)</label><select class="form-select" name="tent_id"><option value="">Tidak terkait tenda</option>@foreach($tents as $tent)<option value="{{ $tent->id }}" @selected(old('tent_id',$payment->tent_id)==$tent->id)>{{ $tent->code }} — {{ $tent->name }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Penyewa (opsional)</label><select class="form-select" name="tenant_id"><option value="">Pilih penyewa</option>@foreach($tenants as $tenant)<option value="{{ $tenant->id }}" @selected(old('tenant_id',$payment->tenant_id)==$tenant->id)>{{ $tenant->name }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Jumlah diterima (Rp) *</label><input type="number" min="1" step="1" class="form-control" name="amount" required value="{{ old('amount',$payment->amount) }}"></div>
<div class="col-md-6"><label class="form-label">Metode pembayaran</label><select class="form-select" name="method"><option value="">Pilih metode</option>@foreach(['Tunai','Transfer bank','QRIS','E-wallet','Lainnya'] as $m)<option value="{{ $m }}" @selected(old('method',$payment->method)===$m)>{{ $m }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Nomor referensi</label><input class="form-control" name="reference" value="{{ old('reference',$payment->reference) }}"></div>
<div class="col-12"><label class="form-label">Catatan</label><textarea class="form-control" name="notes" rows="3">{{ old('notes',$payment->notes) }}</textarea></div>
</div><div class="mt-4 d-flex gap-2"><button class="btn btn-brand">Simpan transaksi</button><a class="btn btn-light" href="{{ route('payments.index') }}">Batal</a></div></form></div>
@endsection
