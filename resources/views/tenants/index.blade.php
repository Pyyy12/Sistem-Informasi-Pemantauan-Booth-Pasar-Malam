@extends('layouts.market')
@section('title','Data Penyewa')
@section('content')
@include('partials.nav')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3"><div><h1 class="h3 fw-bold mb-1">Data Penyewa</h1><p class="muted mb-0">Kelola identitas dan informasi pemilik tenda.</p></div><a class="btn btn-brand" href="{{ route('tenants.create') }}"><i class="bi bi-plus-lg me-1"></i>Tambah penyewa</a></div>
<div class="panel p-3"><form class="row g-2 mb-3"><div class="col-sm-8 col-md-5"><input class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari nama atau telepon..."></div><div class="col-auto"><button class="btn btn-outline-secondary">Cari</button></div></form>
<div class="table-responsive"><table class="table"><thead><tr><th>Nama</th><th>Telepon</th><th>Jenis usaha</th><th>Jumlah tenda</th><th></th></tr></thead><tbody>
@forelse($tenants as $tenant)<tr><td class="fw-semibold">{{ $tenant->name }}</td><td>{{ $tenant->phone ?: '—' }}</td><td>{{ $tenant->business_type ?: '—' }}</td><td>{{ $tenant->tents_count }}</td><td class="text-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('tenants.edit',$tenant) }}">Edit</a> <form class="d-inline" method="POST" action="{{ route('tenants.destroy',$tenant) }}" onsubmit="return confirm('Hapus penyewa ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Hapus</button></form></td></tr>@empty<tr><td colspan="5" class="text-center muted py-4">Belum ada data penyewa.</td></tr>@endforelse
</tbody></table></div>{{ $tenants->links() }}</div>
@endsection
