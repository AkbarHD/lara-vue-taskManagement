<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\UserHasTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $name = $request->name;
        $slug = Str::slug($name);
        $team = Team::create([
            'name' => $name,
            'slug' => $slug
        ]);

        $userhasteam = UserHasTeam::firstOrCreate([
            'user_id' => Auth::user()->id,
            'team_id' => $team->id
        ]);

        // dd($userhasteam);
    }

}
