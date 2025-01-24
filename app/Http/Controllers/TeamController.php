<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->name;
        $slug = Str::slug($name);
        Team::create([
            'name' => $name,
            'slug' => $slug
        ]);
    }
}
