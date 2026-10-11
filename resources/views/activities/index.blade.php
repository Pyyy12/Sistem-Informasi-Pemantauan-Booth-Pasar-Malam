@extends('layouts.market')
@section('title','Aktivitas Wahana')
@section('content')
@include('partials.nav')
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3"><div><h1 class="h3 fw-bold mb-1">Aktivitas Wahana</h1><p class="muted mb-0">Log operasional, pengunjung, dan pemasukan wahana.</p></div><a href="{{ route('activities.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg me-1"></i>Catat aktivitas</a></div>
<div class="panel p-3 table-responsive"><table class="table"><thead><tr><th>Tanggal</th><th>Wahana</th><th>Status</th><th>Pengunjung</th><th>Pemasukan</th><th></th></tr></thead><tbody>
@forelse($activities as $a)<tr><td>{{ $a->activity_date->format('d/m/Y') }}</td><td class="fw-semibold">{{ $a->wahana?->name }}</td><td>{{ ucfirst($a->status) }}</td><td>{{ number_format($a->visitor_count) }}</td><td>Rp {{ number_format($a->income,0,',','.') }}</td><td class="text-end text-nowrap"><a href="{{ route('activities.edit',$a) }}" class="btn btn-sm btn-outline-primary">Edit</a> <form class="d-inline" method="POST" action="{{ route('activities.destroy',$a) }}" onsubmit="return confirm('Hapus catatan aktivitas?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Hapus</button></form></td></tr>@empty<tr><td colspan="6" class="text-center muted py-4">Belum ada aktivitas.</td></tr>@endforelse
</tbody></table>{{ $activities->links() }}</div>
@endsection
