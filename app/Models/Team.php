<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Match;
use App\Models\Player;
use App\Models\Standing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['team_name' ,'kabupaten', 'coach', 'founded_year', 'logo'];

        public function players()
    {
        return $this->belongsToMany(Player::class, 'team_player', 'team_id', 'player_id');
    }

    public function matches()
    {
        return $this->hasMany(Match::class, 'home_team_id')->orWhere('away_team_id', $this->id);
    }

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }
    public function groups()
{
    return $this->belongsToMany(Group::class, 'team_groups', 'team_id', 'group_id');
}
}
