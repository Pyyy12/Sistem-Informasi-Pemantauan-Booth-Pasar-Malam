<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index(Request $request) {
        $tenants = Tenant::withCount('tents')->when($request->q, fn($q, $v) => $q->where('name','like',"%$v%")->orWhere('phone','like',"%$v%"))
            ->latest()->paginate(10)->withQueryString();
        return view('tenants.index', compact('tenants'));
    }
    public function create() { return view('tenants.create', ['tenant' => new Tenant]); }
    public function store(Request $request) {
        $data = $request->validate(['name'=>'required|string|max:150','phone'=>'nullable|string|max:30','business_type'=>'nullable|string|max:120','identity_number'=>'nullable|string|max:100','notes'=>'nullable|string']);
        Tenant::create($data);
        return redirect()->route('tenants.index')->with('success','Data penyewa berhasil ditambahkan.');
    }
    public function show(Tenant $tenant) { return redirect()->route('tenants.edit', $tenant); }
    public function edit(Tenant $tenant) { return view('tenants.edit', compact('tenant')); }
    public function update(Request $request, Tenant $tenant) {
        $data = $request->validate(['name'=>'required|string|max:150','phone'=>'nullable|string|max:30','business_type'=>'nullable|string|max:120','identity_number'=>'nullable|string|max:100','notes'=>'nullable|string']);
        $tenant->update($data);
        return redirect()->route('tenants.index')->with('success','Data penyewa berhasil diperbarui.');
    }
    public function destroy(Tenant $tenant) { $tenant->delete(); return back()->with('success','Data penyewa dihapus.'); }
}
