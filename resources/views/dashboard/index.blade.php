@extends('layouts.market')
@section('title','Dashboard')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4"><div><div class="small muted">RINGKASAN OPERASIONAL</div><h1 class="h2 fw-bold mb-1">Dashboard</h1><p class="muted mb-0">Halo, {{ auth()->user()->name }}. Berikut ringkasan pasar malam.</p></div><div class="small muted">{{ now()->translatedFormat('l, d F Y') }}</div></div>
<div class="row g-3 mb-4">
@foreach([['Total tenda',$tentCount,'bi-shop'],['Tenda terisi',$occupiedCount,'bi-house-check'],['Total penyewa',$tenantCount,'bi-people'],['Wahana aktif',$activeWahana,'bi-ferris-wheel']] as $stat)
<div class="col-6 col-xl-3"><div class="stat-card p-3 p-lg-4"><div class="d-flex justify-content-between"><span class="muted small">{{ $stat[0] }}</span><span class="stat-icon"><i class="bi {{ $stat[2] }}"></i></span></div><div class="display-6 fw-bold mt-2">{{ number_format($stat[1]) }}</div></div></div>
@endforeach
</div>
<div class="row g-3 mb-4">
<div class="col-md-6"><div class="stat-card p-4"><div class="muted">Pemasukan hari ini</div><div class="h2 fw-bold mt-2 mb-0">Rp {{ number_format($todayIncome,0,',','.') }}</div><div class="small muted mt-2">Total transaksi yang dicatat hari ini</div></div></div>
<div class="col-md-6"><div class="stat-card p-4"><div class="muted">Pemasukan bulan ini</div><div class="h2 fw-bold mt-2 mb-0">Rp {{ number_format($monthIncome,0,',','.') }}</div><div class="small muted mt-2">Akumulasi dari awal bulan sampai hari ini</div></div></div>
</div>
<div class="row g-3">
<div class="col-lg-7"><div class="panel p-3 p-md-4"><div class="d-flex justify-content-between align-items-center mb-3"><h5 class="fw-bold mb-0">Transaksi terbaru</h5><a href="{{ route('payments.index') }}" class="small text-decoration-none">Lihat semua</a></div><div class="table-responsive"><table class="table mb-0"><thead><tr><th>Tanggal</th><th>Tenda</th><th>Jenis</th><th class="text-end">Jumlah</th></tr></thead><tbody>@forelse($recentPayments as $p)<tr><td>{{ $p->paid_at->format('d/m/Y') }}</td><td>{{ $p->tent?->code ?? '—' }}</td><td>{{ $p->type === 'rent' ? 'Sewa' : 'Operasional' }}</td><td class="text-end fw-semibold">Rp {{ number_format($p->amount,0,',','.') }}</td></tr>@empty<tr><td colspan="4" class="text-center muted py-4">Belum ada transaksi.</td></tr>@endforelse</tbody></table></div></div></div>
<div class="col-lg-5"><div class="panel p-3 p-md-4 h-100"><h5 class="fw-bold mb-3">Aktivitas wahana terbaru</h5>@forelse($recentActivities as $a)<div class="d-flex justify-content-between gap-3 py-3 border-bottom"><div><div class="fw-semibold">{{ $a->wahana?->name ?? 'Wahana dihapus' }}</div><div class="small muted">{{ $a->activity_date->format('d/m/Y') }} · {{ number_format($a->visitor_count) }} pengunjung</div></div><span class="badge text-bg-{{ $a->status === 'active' ? 'success' : 'secondary' }} align-self-start">{{ ucfirst($a->status) }}</span></div>@empty<p class="muted">Belum ada aktivitas dicatat.</p>@endforelse<a href="{{ route('activities.create') }}" class="btn btn-brand mt-3">Catat aktivitas</a></div></div>
</div>
@endsection
