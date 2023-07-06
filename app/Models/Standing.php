<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Standing extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'team_id', 'played', 'won', 'drawn', 'lost', 'goals_for', 'goals_against', 'goal_difference','points'];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
