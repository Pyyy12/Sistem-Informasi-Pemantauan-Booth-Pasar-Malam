<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    protected function redirectWithSuccess(Request $request, string $route, string $message)
    {
        return redirect()->route($route)->with('success', $message);
    }
}
