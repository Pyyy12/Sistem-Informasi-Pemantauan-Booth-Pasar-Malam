<?php

namespace App\Http\Controllers;

use App\Models\Wahana;
use Illuminate\Http\Request;

class WahanaController extends Controller
{
    public function index() { $wahana = Wahana::withCount('activities')->orderBy('name')->paginate(10); return view('wahana.index', compact('wahana')); }
    public function create() { return view('wahana.create', ['item'=>new Wahana]); }
    public function store(Request $request) { $item=Wahana::create($request->validate($this->rules())); return redirect()->route('wahana.index')->with('success','Wahana ditambahkan.'); }
    public function show(Wahana $wahana) { return redirect()->route('wahana.edit',$wahana); }
    public function edit(Wahana $wahana) { return view('wahana.edit',['item'=>$wahana]); }
    public function update(Request $request, Wahana $wahana) { $wahana->update($request->validate($this->rules())); return redirect()->route('wahana.index')->with('success','Wahana diperbarui.'); }
    public function destroy(Wahana $wahana) { $wahana->delete(); return back()->with('success','Wahana dihapus.'); }
    private function rules(): array { return ['name'=>'required|string|max:150','operator_name'=>'nullable|string|max:150','location'=>'nullable|string|max:150','status'=>'required|in:active,inactive,maintenance,finished','opening_time'=>'nullable|date_format:H:i','closing_time'=>'nullable|date_format:H:i','notes'=>'nullable|string']; }
}
