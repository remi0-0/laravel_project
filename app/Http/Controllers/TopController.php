<?php

namespace App\Http\Controllers;
use App\Models\Plan;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index(Request $request)
    {
        $plans = Plan::select('id', 'todo', 'created_at')
        ->where('flg',0)->get();

        return view('top', compact('plans'));
    }


}
