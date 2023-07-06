<?php

namespace App\Models;

use App\Models\Goal;
use App\Models\Team;
use App\Models\RoundOf16;
use App\Models\SemiFinal;
use App\Models\FinalMatch;
use App\Models\QuarterFinal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Match extends Model
{
    use HasFactory;
    protected $table = 'matches';
    protected $dates = [
       'match_date',
    ];
    protected $fillable = ['home_team_id', 'away_team_id', 'home_team_score', 'away_team_score', 'place', 'match_date' ,'match_time'];
    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
    public function roundOf16()
    {
        return $this->belongsTo(RoundOf16::class);
    }
    public function quarterFinal()
    {
        return $this->belongsTo(QuarterFinal::class);
    }
    public function semiFinal()
    {
        return $this->belongsTo(SemiFinal::class);
    }
    public function final()
    {
        return $this->belongsTo(FinalMatch::class);
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
    public function homeGoalScorers()
    {
        return $this->hasMany(Goal::class, 'match_id')->where('team_id', $this->team1_id);
    }

    public function awayGoalScorers()
    {
        return $this->hasMany(Goal::class, 'match_id')->where('team_id', $this->team2_id);
    }
}
