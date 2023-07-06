<?php

namespace App\Models;

use App\Models\Goal;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ['player_name', 'nomor_punggung', 'position', 'date_of_birth', 'height', 'weight', 'foto'];
        public function teams()
    {
        return $this->belongsToMany(Team::class, 'player_team', 'player_id', 'team_id');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
}
