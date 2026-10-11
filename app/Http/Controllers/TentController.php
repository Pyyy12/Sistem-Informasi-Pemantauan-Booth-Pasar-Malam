<?php

namespace App\Http\Controllers;

use App\Models\Tent;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TentController extends Controller
{
    public function index(Request $request) {
        $tents = Tent::with('tenant')->when($request->q, fn($q, $v) => $q->where('code','like',"%$v%")->orWhere('name','like',"%$v%"))
            ->when($request->status, fn($q, $v) => $q->where('status',$v))->orderBy('code')->paginate(10)->withQueryString();
        return view('tents.index', compact('tents'));
    }
    public function create() { return view('tents.create', ['tent'=>new Tent, 'tenants'=>Tenant::orderBy('name')->get()]); }
    public function store(Request $request) {
        $data = $request->validate($this->rules());
        Tent::create($data);
        return redirect()->route('tents.index')->with('success','Data tenda berhasil ditambahkan.');
    }
    public function show(Tent $tent) { return redirect()->route('tents.edit',$tent); }
    public function edit(Tent $tent) { return view('tents.edit', ['tent'=>$tent, 'tenants'=>Tenant::orderBy('name')->get()]); }
    public function update(Request $request, Tent $tent) {
        $data = $request->validate($this->rules($tent));
        $tent->update($data);
        return redirect()->route('tents.index')->with('success','Data tenda berhasil diperbarui.');
    }
    public function destroy(Tent $tent) { $tent->delete(); return back()->with('success','Data tenda dihapus.'); }
    private function rules(?Tent $tent=null): array {
        return ['code'=>['required','string','max:40',Rule::unique('tents','code')->ignore($tent?->id)],'name'=>'required|string|max:150',
            'tenant_id'=>'nullable|exists:tenants,id','location'=>'nullable|string|max:150','rent_price'=>'required|numeric|min:0',
            'rent_period'=>'required|in:day,week,month,event','start_date'=>'nullable|date','end_date'=>'nullable|date|after_or_equal:start_date',
            'status'=>'required|in:available,occupied,maintenance','notes'=>'nullable|string'];
    }
}
