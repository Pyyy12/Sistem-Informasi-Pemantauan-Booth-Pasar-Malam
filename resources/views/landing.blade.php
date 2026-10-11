@extends('layouts.market')
@section('title','Kelola Pasar Malam Lebih Mudah')
@section('content')
<section class="hero p-4 p-md-5 mb-5 overflow-hidden">
    <div class="row align-items-center g-4 py-lg-3">
        <div class="col-lg-7">
            <span class="badge rounded-pill text-bg-light text-dark mb-3 px-3 py-2"><i class="bi bi-stars me-1"></i> Satu dashboard, semua terpantau</span>
            <h1 class="display-5 fw-bold lh-sm mb-3">Kelola pasar malam dengan <span style="color:#a99aff">lebih tertata.</span></h1>
            <p class="lead text-white-50 mb-4">Pantau aktivitas wahana, data penyewa, biaya sewa tenda, dan pemasukan dalam satu sistem yang mudah digunakan.</p>
            <div class="d-flex flex-wrap gap-2"><a href="{{ route('login') }}" class="btn btn-brand btn-lg px-4">Masuk ke dashboard <i class="bi bi-arrow-right ms-2"></i></a><a href="#fitur" class="btn btn-outline-light btn-lg px-4">Jelajahi fitur</a></div>
            <div class="d-flex gap-4 mt-4 small text-white-50"><span><i class="bi bi-check-circle me-1"></i>Data terpusat</span><span><i class="bi bi-check-circle me-1"></i>Laporan praktis</span></div>
        </div>
        <div class="col-lg-5">
            <div class="bg-white text-dark p-3 p-md-4 rounded-4 shadow-lg">
                <div class="d-flex justify-content-between align-items-center mb-4"><div><div class="small muted">Ringkasan area</div><h5 class="mb-0 fw-bold">Pasar Malam</h5></div><span class="badge rounded-pill text-bg-success">Live data</span></div>
                <div class="row g-3">
                    <div class="col-6"><div class="p-3 rounded-3" style="background:#f2efff"><i class="bi bi-shop fs-4" style="color:#6c4df6"></i><div class="small muted mt-2">Total tenda</div><div class="fs-3 fw-bold">{{ $tentCount }}</div></div></div>
                    <div class="col-6"><div class="p-3 rounded-3" style="background:#eafaf4"><i class="bi bi-ferris-wheel fs-4 text-success"></i><div class="small muted mt-2">Wahana</div><div class="fs-3 fw-bold">{{ $wahanaCount }}</div></div></div>
                </div>
                <div class="mt-3 p-3 border rounded-3 d-flex align-items-center gap-3"><div class="stat-icon"><i class="bi bi-graph-up-arrow"></i></div><div><div class="fw-semibold">Pencatatan lebih rapi</div><div class="small muted">Sewa, pemasukan, dan aktivitas.</div></div></div>
            </div>
        </div>
    </div>
</section>
<section id="fitur" class="mb-5">
    <div class="text-center mb-4"><div class="text-uppercase small fw-bold" style="color:#6c4df6;letter-spacing:2px">Fitur utama</div><h2 class="fw-bold mt-2">Semua kebutuhan operasional</h2><p class="muted">Dirancang untuk membantu pengelola memantau area dan keuangan.</p></div>
    <div class="row g-3">
        @foreach([['bi-shop','Tenda & Penyewa','Data tenda, penyewa, lokasi, tarif, dan periode sewa.'],['bi-ferris-wheel','Aktivitas Wahana','Status operasional, catatan harian, jumlah pengunjung, dan pemasukan.'],['bi-cash-coin','Pembayaran & Pemasukan','Catat pembayaran sewa dan pemasukan operasional terpisah.'],['bi-bar-chart-line','Laporan','Lihat ringkasan transaksi dan pemasukan berdasarkan tanggal.']] as $feature)
        <div class="col-sm-6 col-lg-3"><div class="panel p-4 h-100"><div class="stat-icon mb-3"><i class="bi {{ $feature[0] }}"></i></div><h5 class="fw-bold">{{ $feature[1] }}</h5><p class="muted mb-0">{{ $feature[2] }}</p></div></div>
        @endforeach
    </div>
</section>
<section class="panel p-4 p-md-5 text-center"><h2 class="fw-bold">Siap mengelola pasar malam?</h2><p class="muted">Masuk untuk mulai mencatat operasional dan pemasukan.</p><a href="{{ route('login') }}" class="btn btn-brand px-4 py-2">Buka dashboard <i class="bi bi-arrow-right ms-1"></i></a></section>
@endsection
