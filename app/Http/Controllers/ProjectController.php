<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::latest()->paginate(5);

        return view('projects.index', compact('projects'));
    }
}
