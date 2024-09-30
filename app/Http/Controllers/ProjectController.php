<?php

namespace App\Http\Controllers;

use App\Models\UserProject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $userProjects = UserProject::with(['user', 'projectType', 'experience', 'attachments'])
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('project.index', compact('userProjects'));
    }

    public function show(UserProject $userProject)
    {
        return view('project.show', compact('userProject'));
    }

    public function destroy(UserProject $userProject)
    {
        $userProject->delete();
        return redirect()->route('projects.index')->with('success', 'User project deleted successfully.');
    }

}
