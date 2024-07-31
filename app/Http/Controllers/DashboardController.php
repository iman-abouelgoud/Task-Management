<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $totalTasks = Task::count();
        $totalProjects = Project::count();

        $data = [
            ['title' => 'Total Tasks', 'icon' => 'fa-solid fa-bars-progress', 'totalCount' => $totalTasks],
            ['title' => 'Total Projects', 'icon' => 'fas fa-project-diagram', 'totalCount' => $totalProjects],
        ];

        return view('index', compact('data'));
    }
}
