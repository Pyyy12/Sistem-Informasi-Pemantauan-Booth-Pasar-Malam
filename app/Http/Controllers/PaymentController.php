<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tent;
use App\Models\Tenant;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request) {
        $payments=Payment::with(['tent','tenant'])->when($request->type,fn($q,$v)=>$q->where('type',$v))
            ->when($request->from,fn($q,$v)=>$q->whereDate('paid_at','>=',$v))
            ->when($request->to,fn($q,$v)=>$q->whereDate('paid_at','<=',$v))
            ->latest('paid_at')->paginate(12)->withQueryString();
        return view('payments.index',compact('payments'));
    }
    public function create() { return view('payments.create',['payment'=>new Payment,'tents'=>Tent::with('tenant')->orderBy('code')->get(),'tenants'=>Tenant::orderBy('name')->get()]); }
    public function store(Request $request) { $data=$request->validate($this->rules()); $data['recorded_by']=$request->user()->id; Payment::create($data); return redirect()->route('payments.index')->with('success','Pemasukan berhasil dicatat.'); }
    public function edit(Payment $payment) { return view('payments.edit',['payment'=>$payment,'tents'=>Tent::with('tenant')->orderBy('code')->get(),'tenants'=>Tenant::orderBy('name')->get()]); }
    public function update(Request $request,Payment $payment) { $payment->update($request->validate($this->rules())); return redirect()->route('payments.index')->with('success','Pembayaran diperbarui.'); }
    public function destroy(Payment $payment) { $payment->delete(); return back()->with('success','Transaksi dihapus.'); }
    private function rules(): array { return ['tent_id'=>'nullable|exists:tents,id','tenant_id'=>'nullable|exists:tenants,id','type'=>'required|in:rent,operational','amount'=>'required|numeric|min:1','paid_at'=>'required|date','method'=>'nullable|string|max:80','reference'=>'nullable|string|max:100','notes'=>'nullable|string']; }
}
