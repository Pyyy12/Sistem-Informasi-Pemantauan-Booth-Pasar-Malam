<div class="row g-3">
<div class="col-md-6"><label class="form-label">Nama penyewa *</label><input class="form-control" name="name" required value="{{ old('name',$tenant->name) }}"></div>
<div class="col-md-6"><label class="form-label">Nomor telepon</label><input class="form-control" name="phone" value="{{ old('phone',$tenant->phone) }}"></div>
<div class="col-md-6"><label class="form-label">Jenis usaha</label><input class="form-control" name="business_type" value="{{ old('business_type',$tenant->business_type) }}" placeholder="Contoh: makanan, permainan"></div>
<div class="col-md-6"><label class="form-label">Nomor identitas</label><input class="form-control" name="identity_number" value="{{ old('identity_number',$tenant->identity_number) }}"></div>
<div class="col-12"><label class="form-label">Catatan</label><textarea class="form-control" name="notes" rows="3">{{ old('notes',$tenant->notes) }}</textarea></div>
</div>
