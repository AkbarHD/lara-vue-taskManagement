<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function create()
    {
        $teams = Team::whereHas('users', function (Builder $query) {
            $query->where('user_id', Auth::user()->id);
        })->get();
        return Inertia::render('Projects/CreateProject', [
            'menuProject' => 'active',
            'teams' => $teams
        ]);
    }
}
