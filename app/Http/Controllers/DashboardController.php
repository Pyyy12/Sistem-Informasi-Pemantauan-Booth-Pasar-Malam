<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tent;
use App\Models\Tenant;
use App\Models\Wahana;
use App\Models\WahanaActivity;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $monthStart = Carbon::now()->startOfMonth()->toDateString();
        $today = Carbon::today()->toDateString();

        return view('dashboard.index', [
            'tentCount' => Tent::count(),
            'occupiedCount' => Tent::where('status', 'occupied')->count(),
            'tenantCount' => Tenant::count(),
            'wahanaCount' => Wahana::count(),
            'todayIncome' => Payment::whereDate('paid_at', $today)->sum('amount'),
            'monthIncome' => Payment::whereBetween('paid_at', [$monthStart, $today])->sum('amount'),
            'activeWahana' => Wahana::where('status', 'active')->count(),
            'recentPayments' => Payment::with(['tent', 'tenant'])->latest('paid_at')->take(8)->get(),
            'recentActivities' => WahanaActivity::with('wahana')->latest('activity_date')->take(6)->get(),
        ]);
    }
}
