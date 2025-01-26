<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasTeam extends Model
{
    use HasFactory;
    protected $table = 'user_has_teams';
    protected $fillable = ['user_id', 'team_id'];
}
