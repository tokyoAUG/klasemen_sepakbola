<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Group;
use App\Models\Match;
use App\Models\Standing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MatchController extends Controller
{
    public function index(){
        $pertandingan = Match::with(['homeTeam', 'awayTeam'])->get();
        return view('admin.pertandingan', ['pertandingan' => $pertandingan]);
    }
    public function formTambahPertandingan(){
        $groups = Group::all();
        $teams = Team::with('groups')->get();

        return view('admin.tambah-pertandingan', ['groups' => $groups, 'teams' => $teams]);
    }
    public function getTeamsByGroup($groupId)
    {
        $teams = Team::whereHas('groups', function ($query) use ($groupId) {
            $query->where('group_id', $groupId);
        })->get();

        return response()->json(['teams' => $teams]);
    }
    public function add(Request $request){
        $validatedData = $request->validate([
            'group' => 'required',
            'home_team' => 'required',
            'away_team' => 'required',
            'home_team_score' => 'required|integer',
            'away_team_score' => 'required|integer',
            'match_date' => 'required|date',
            'match_time' => 'required',
        ]);
        $homeTeam = Team::find($request->home_team);
        $awayTeam = Team::find($request->away_team);
    
        // Cek apakah tim-tim tersebut sudah pernah bertanding
        if ($homeTeam && $awayTeam && $this->teamsHavePlayed($homeTeam, $awayTeam)) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tim sudah pernah bertanding');
            return redirect()->back();
        }
        $match = new Match;
        // $match->group_id = $request->group;
        $match->home_team_id = $request->home_team;
        $match->away_team_id = $request->away_team;
        $match->home_team_score = $request->home_team_score;
        $match->away_team_score = $request->away_team_score;
        $match->match_date = $request->match_date;
        $match->match_time = $request->match_time;

        // Simpan pertandingan
        $match->save();
        $group_id = $request->group;
        $homeStanding = Standing::firstOrNew([
            'group_id' => $group_id,
            'team_id' => $match->home_team_id,
        ]);
        $homeStanding->played += 1; //menghitung jumlah main
        $homeStanding->goals_for += $match->home_team_score; //menghitung jumlah goal
        $homeStanding->goals_against += $match->away_team_score; //menghitung jumlah kebobolan
        //menghitung jumlah menang, kalah, seri
        if ($match->home_team_score > $match->away_team_score) {
            $homeStanding->won += 1;
            $homeStanding->points += 3; //jika menang mendapatkan 3 point
        } elseif ($match->home_team_score < $match->away_team_score) {
            $homeStanding->lost += 1;
            // Jika kalah tidak mendapatkan poin
        } else {
            $homeStanding->drawn += 1;
            $homeStanding->points += 1; //jika seri mendapatkan 1 point
        }
        //menghitung selesih goal, jumlah_goal - jumlah kebobolan
        $homeStanding->goal_difference = $homeStanding->goals_for - $homeStanding->goals_against;
        //menghitung jumlah point menang dikali 3, seri dikali 1 kemudian ditambah
        $homeStanding->points = ($homeStanding->won * 3) + ($homeStanding->drawn * 1);
    
        
        $homeStanding->save();
    
        // Update data standing untuk tim tamu
        $awayStanding = Standing::firstOrNew([
            'group_id' => $group_id,
            'team_id' => $match->away_team_id,
        ]);
        $awayStanding->played += 1;
        $awayStanding->goals_for += $match->away_team_score;
        $awayStanding->goals_against += $match->home_team_score;
        if ($match->away_team_score > $match->home_team_score) {
            $awayStanding->won += 1;
            $awayStanding->points += 3; 
        } elseif ($match->away_team_score < $match->home_team_score) {
            $awayStanding->lost += 1;
            // Tim kalah tidak mendapatkan poin
        } else {
            $awayStanding->drawn += 1;
            $awayStanding->points += 1;
        }
        $awayStanding->goal_difference = $awayStanding->goals_for - $awayStanding->goals_against;
        $awayStanding->points = ($awayStanding->won * 3) + ($awayStanding->drawn * 1);
        // Lakukan perhitungan lainnya sesuai kebutuhan (misalnya: won, drawn, lost, goal_difference, points)
        // ...
    
        $awayStanding->save();
        Session::flash('status', 'success');
        Session::flash('message', 'pertandingan berhasil ditambahkan');
        return redirect('pertandingan');
    }
        private function teamsHavePlayed($homeTeam, $awayTeam)
    {
        // Cek apakah terdapat pertandingan sebelumnya antara kedua tim
        $previousMatches = Match::where(function ($query) use ($homeTeam, $awayTeam) {
            $query->where('home_team_id', $homeTeam->id)
                ->where('away_team_id', $awayTeam->id);
        })->orWhere(function ($query) use ($homeTeam, $awayTeam) {
            $query->where('home_team_id', $awayTeam->id)
                ->where('away_team_id', $homeTeam->id);
        })->exists();

        return $previousMatches;
    }
    public function formTambahPertandinganMulti(){
        $groups = Group::all();
        $teams = Team::with('groups')->get();
        return view('admin.tambah-pertandingan-multiple', ['groups' => $groups, 'teams' => $teams]);
    }
}
