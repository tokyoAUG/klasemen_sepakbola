<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Match;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuarterFinal extends Model
{
    use HasFactory;
    protected $table = 'quarter_finals';
    protected $fillable = [
        'match_id',
        'team1_id',
        'team2_id',
        'winner_id',
        'date',
        'time',
    ];
    public function match()
    {
        return $this->belongsTo(Match::class, 'match_id');
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function winner()
    {
        return $this->belongsTo(Team::class, 'winner_id');
    }
}
