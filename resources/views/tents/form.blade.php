<div class="row g-3">
<div class="col-md-4"><label class="form-label">Kode tenda *</label><input class="form-control" name="code" required value="{{ old('code',$tent->code) }}" placeholder="T-001"></div>
<div class="col-md-8"><label class="form-label">Nama tenda *</label><input class="form-control" name="name" required value="{{ old('name',$tent->name) }}" placeholder="Tenda makanan"></div>
<div class="col-md-6"><label class="form-label">Penyewa</label><select class="form-select" name="tenant_id"><option value="">Belum ditentukan</option>@foreach($tenants as $tenant)<option value="{{ $tenant->id }}" @selected(old('tenant_id',$tent->tenant_id)==$tenant->id)>{{ $tenant->name }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Lokasi</label><input class="form-control" name="location" value="{{ old('location',$tent->location) }}" placeholder="Blok A"></div>
<div class="col-md-4"><label class="form-label">Harga sewa (Rp) *</label><input type="number" min="0" step="1000" class="form-control" name="rent_price" required value="{{ old('rent_price',$tent->rent_price ?? 0) }}"></div>
<div class="col-md-4"><label class="form-label">Periode tarif *</label><select class="form-select" name="rent_period" required>@foreach(['day'=>'Per hari','week'=>'Per minggu','month'=>'Per bulan','event'=>'Per acara'] as $k=>$v)<option value="{{ $k }}" @selected(old('rent_period',$tent->rent_period ?? 'event')===$k)>{{ $v }}</option>@endforeach</select></div>
<div class="col-md-4"><label class="form-label">Status *</label><select class="form-select" name="status" required>@foreach(['available'=>'Tersedia','occupied'=>'Terisi','maintenance'=>'Perawatan'] as $k=>$v)<option value="{{ $k }}" @selected(old('status',$tent->status ?? 'available')===$k)>{{ $v }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Tanggal mulai</label><input type="date" class="form-control" name="start_date" value="{{ old('start_date',$tent->start_date?->format('Y-m-d')) }}"></div>
<div class="col-md-6"><label class="form-label">Tanggal berakhir</label><input type="date" class="form-control" name="end_date" value="{{ old('end_date',$tent->end_date?->format('Y-m-d')) }}"></div>
<div class="col-12"><label class="form-label">Catatan</label><textarea class="form-control" name="notes" rows="3">{{ old('notes',$tent->notes) }}</textarea></div>
</div>
