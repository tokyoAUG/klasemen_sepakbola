<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Standing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }
        public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_groups', 'group_id', 'team_id');
    }
}
