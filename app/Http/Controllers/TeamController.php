<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function index(){
        $team = Team::all();
        return view('admin.index', ['team' => $team]);
    }
    public function formTambahTeam(){
        $group = Group::all();
        return view('admin.tambah-team', ['group' => $group]);
    }
    public function add(Request $request){
        $validatedData = $request->validate([
            'team_name' => 'required|string|unique:teams',
            'kabupaten' => 'required|string',
            'coach' => 'required|string',
            'founded_year' => 'required|integer',
            'group' => 'required|string',
        ]);

        $team = new Team();
        $team->team_name = $validatedData['team_name'];
        $team->kabupaten = $validatedData['kabupaten'];
        $team->coach = $validatedData['coach'];
        $team->founded_year = $validatedData['founded_year'];
        $team->save();
        $group_id = $request->input('group');
        $team->groups()->attach($group_id);
        Session::flash('status', 'success');
        Session::flash('message', 'Team berhasil ditambahkan');
        return redirect('/');
    }
}
