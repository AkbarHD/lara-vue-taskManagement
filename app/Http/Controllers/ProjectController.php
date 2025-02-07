<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        // ke relasi teams dlu, lalu ke relasi users, yang di model teams
        $listProjects = Project::whereHas('teams.users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        $projects = Project::when($request->q, function($query, $q) {
            $query->where('name_proyek', 'LIKE', '%' . $q . '%');
        })->whereHas('teams.users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        // menampilan tim berdasarkan id yang sedang login
        $teams = Team::whereHas('users', function (Builder $query) {
            $query->where('user_id', Auth::user()->id);
        })->get();
        return Inertia::render('Projects/ProjectList', [
            'menuTask' => 'active',
            'projects' => $projects,
            'listProjects' => $listProjects, // agar tidak ikut ke sarch
            'teams' => $teams,
            'search' => $request->only('q')
        ]);
    }
    public function create()
    {
        // menampilan tim berdasarkan id yang sedang login
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

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'team_id' => 'required',
            'name_proyek' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);
        $project = Project::find($id);
        $project->team_id = $request->input('team_id');
        $project->name_proyek = $request->input('name_proyek');
        $project->start = $request->input('start');
        $project->end = $request->input('end');
        $project->update();
    }

    public function delete($id)
    {
        $project = Project::find($id);
        if($project){
            $project->delete();
        }
    }

}
