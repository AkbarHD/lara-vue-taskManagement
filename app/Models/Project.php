<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'name_proyek',
        'start',
        'end',
    ];

    public function Teams()
    {
        return $this->belongsTo(Team::class);
    }

}
