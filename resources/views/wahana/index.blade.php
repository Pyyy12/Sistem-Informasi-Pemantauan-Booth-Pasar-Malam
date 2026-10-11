@extends('layouts.market')
@section('title','Data Wahana')
@section('content')
@include('partials.nav')
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3"><div><h1 class="h3 fw-bold mb-1">Data Wahana</h1><p class="muted mb-0">Pantau wahana dan penanggung jawabnya.</p></div><a href="{{ route('wahana.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg me-1"></i>Tambah wahana</a></div>
<div class="panel p-3 table-responsive"><table class="table"><thead><tr><th>Nama wahana</th><th>Operator</th><th>Lokasi</th><th>Jam operasi</th><th>Status</th><th></th></tr></thead><tbody>
@forelse($wahana as $item)<tr><td class="fw-semibold">{{ $item->name }}</td><td>{{ $item->operator_name ?: '—' }}</td><td>{{ $item->location ?: '—' }}</td><td>{{ $item->opening_time ? substr($item->opening_time,0,5).'–'.substr($item->closing_time,0,5) : '—' }}</td><td>{{ ucfirst($item->status) }}</td><td class="text-end text-nowrap"><a href="{{ route('wahana.edit',$item) }}" class="btn btn-sm btn-outline-primary">Edit</a> <form class="d-inline" method="POST" action="{{ route('wahana.destroy',$item) }}" onsubmit="return confirm('Hapus wahana?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Hapus</button></form></td></tr>@empty<tr><td colspan="6" class="text-center muted py-4">Belum ada wahana.</td></tr>@endforelse
</tbody></table>{{ $wahana->links() }}</div>
@endsection
