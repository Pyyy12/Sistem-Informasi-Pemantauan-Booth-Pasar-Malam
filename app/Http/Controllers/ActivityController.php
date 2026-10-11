<?php

namespace App\Http\Controllers;

use App\Models\Wahana;
use App\Models\WahanaActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index() { $activities=WahanaActivity::with('wahana')->latest('activity_date')->paginate(12); return view('activities.index',compact('activities')); }
    public function create() { return view('activities.create',['activity'=>new WahanaActivity,'wahana'=>Wahana::orderBy('name')->get()]); }
    public function store(Request $request) { $data=$request->validate($this->rules()); $data['recorded_by']=$request->user()->id; WahanaActivity::create($data); return redirect()->route('activities.index')->with('success','Aktivitas dicatat.'); }
    public function show(WahanaActivity $activity) { return redirect()->route('activities.edit',$activity); }
    public function edit(WahanaActivity $activity) { return view('activities.edit',['activity'=>$activity,'wahana'=>Wahana::orderBy('name')->get()]); }
    public function update(Request $request,WahanaActivity $activity) { $data=$request->validate($this->rules()); $activity->update($data); return redirect()->route('activities.index')->with('success','Aktivitas diperbarui.'); }
    public function destroy(WahanaActivity $activity) { $activity->delete(); return back()->with('success','Aktivitas dihapus.'); }
    private function rules(): array { return ['wahana_id'=>'required|exists:wahana,id','activity_date'=>'required|date','status'=>'required|in:active,inactive,maintenance,finished','visitor_count'=>'required|integer|min:0','income'=>'required|numeric|min:0','notes'=>'nullable|string']; }
}
