<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function create()
    {
        return Inertia::render('Projects/CreateProject', [
            'menuProject' => 'active',
        ]);
    }
}
