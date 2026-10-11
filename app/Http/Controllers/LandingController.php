<?php

namespace App\Http\Controllers;

use App\Models\Tent;
use App\Models\Wahana;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        return view('landing', [
            'tentCount' => Tent::count(),
            'wahanaCount' => Wahana::count(),
        ]);
    }
}
