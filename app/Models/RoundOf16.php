<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoundOf16 extends Model
{
    use HasFactory;
    protected $table = 'round_of_16';
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
