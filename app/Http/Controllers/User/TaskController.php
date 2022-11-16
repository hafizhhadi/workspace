<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function store(Request $request, Workspace $workspace)
    {
        Task::create([
            'workspace_id' => $workspace->id,
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->due_date." ".$request->due_time,
        ]);
     
        return view('workspaces.show', compact('workspace'));
    }

}
