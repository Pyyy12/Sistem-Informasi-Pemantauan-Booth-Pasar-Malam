<div class="panel p-3 mb-4"><div class="d-flex flex-wrap gap-2">
<a class="btn btn-sm {{ request()->routeIs('dashboard')?'btn-brand':'btn-outline-secondary' }}" href="{{ route('dashboard') }}"><i class="bi bi-grid me-1"></i>Dashboard</a>
<a class="btn btn-sm {{ request()->routeIs('tenants.*')?'btn-brand':'btn-outline-secondary' }}" href="{{ route('tenants.index') }}">Penyewa</a>
<a class="btn btn-sm {{ request()->routeIs('tents.*')?'btn-brand':'btn-outline-secondary' }}" href="{{ route('tents.index') }}">Tenda</a>
<a class="btn btn-sm {{ request()->routeIs('wahana.*')?'btn-brand':'btn-outline-secondary' }}" href="{{ route('wahana.index') }}">Wahana</a>
<a class="btn btn-sm {{ request()->routeIs('activities.*')?'btn-brand':'btn-outline-secondary' }}" href="{{ route('activities.index') }}">Aktivitas</a>
<a class="btn btn-sm {{ request()->routeIs('payments.*')?'btn-brand':'btn-outline-secondary' }}" href="{{ route('payments.index') }}">Pemasukan</a>
<a class="btn btn-sm {{ request()->routeIs('reports.*')?'btn-brand':'btn-outline-secondary' }}" href="{{ route('reports.index') }}">Laporan</a>
</div></div>
