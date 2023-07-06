<?php

namespace App\Http\Controllers;

use App\Models\Standing;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index(){
        $standings = Standing::with('group', 'team')
        ->orderByDesc('points')
        ->orderByDesc('goal_difference')
        ->get();
        return view('admin.standing', ['standings' => $standings]);
    }
}
