<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::get();
        return Inertia::render('Projects/ProjectList', [
            'menuTask' => 'active',
            'projects' => $projects
        ]);
    }
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

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'team_id' => 'required',
            'name_proyek' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);

        // Simpan data ke database
        Project::create([
            'team_id' => $request->input('team_id'),
            'name_proyek' => $request->input('name_proyek'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        // return response()->json(['success' => 'Project created successfully!']);
    }

}
