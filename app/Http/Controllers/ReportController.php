<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index(Request $request) {
        $from=$request->input('from', Carbon::now()->startOfMonth()->toDateString());
        $to=$request->input('to', Carbon::today()->toDateString());
        $query=Payment::with(['tent','tenant'])->whereBetween('paid_at',[$from,$to]);
        $payments=(clone $query)->latest('paid_at')->get();
        $rentTotal=(clone $query)->where('type','rent')->sum('amount');
        $operationalTotal=(clone $query)->where('type','operational')->sum('amount');
        $perTent=Tent::withSum(['payments as income_total'=>fn($q)=>$q->whereBetween('paid_at',[$from,$to])],'amount')->orderBy('code')->get();
        return view('reports.index',compact('from','to','payments','rentTotal','operationalTotal','perTent'));
    }
}
