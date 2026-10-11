<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PasarMalam') · PasarMalam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root{--ink:#182331;--muted:#6b7787;--brand:#6c4df6;--brand2:#17b890;--surface:#fff;--bg:#f4f6fb}
        body{background:var(--bg);color:var(--ink);font-family:Inter,system-ui,-apple-system,sans-serif}
        .navbar-market{background:#111827}.brand-mark{display:inline-grid;place-items:center;width:36px;height:36px;border-radius:12px;background:linear-gradient(135deg,#7c5cff,#20c997);color:white}
        .btn-brand{background:var(--brand);border-color:var(--brand);color:white}.btn-brand:hover{background:#5639df;color:white}
        .hero{background:radial-gradient(circle at 80% 15%,#45318e 0,transparent 32%),linear-gradient(135deg,#111827,#202b47);color:white;border-radius:28px}
        .panel,.stat-card{background:white;border:1px solid #e8ebf3;border-radius:18px;box-shadow:0 8px 30px rgba(23,35,58,.04)}
        .stat-icon{width:44px;height:44px;border-radius:14px;display:grid;place-items:center;background:#f0edff;color:var(--brand);font-size:1.25rem}
        .muted{color:var(--muted)}.table>:not(caption)>*>*{padding:14px 16px;vertical-align:middle}
        .form-control,.form-select{padding:.7rem .85rem;border-color:#dfe4ee;border-radius:10px}
        .nav-pills .nav-link{color:#5d6879;border-radius:10px}.nav-pills .nav-link.active{background:#ede9ff;color:#5136d9;font-weight:600}
        .badge-soft{background:#edf9f4;color:#12805d}.footer{color:#8a94a4}
        @media(max-width:767px){.hero{border-radius:20px}.table-responsive{font-size:.9rem}.stat-card{height:100%}}
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-dark navbar-market py-3">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('landing') }}"><span class="brand-mark"><i class="bi bi-stars"></i></span> PasarMalam</a>
        <div class="d-flex align-items-center gap-2">
            @auth
                <a class="btn btn-sm btn-outline-light" href="{{ route('dashboard') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-sm btn-light" type="submit">Keluar</button></form>
            @else
                <a class="btn btn-sm btn-outline-light" href="{{ route('login') }}">Masuk</a>
                <a class="btn btn-sm btn-brand" href="{{ route('register') }}">Buat akun</a>
            @endauth
        </div>
    </div>
</nav>
<main class="container py-4 py-lg-5">
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
    @if($errors->any())<div class="alert alert-danger"><strong>Periksa kembali data:</strong><ul class="mb-0 mt-2">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    @yield('content')
</main>
<footer class="container text-center footer py-4 small">© {{ date('Y') }} PasarMalam · Sistem pemantauan dan pencatatan pasar malam</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
