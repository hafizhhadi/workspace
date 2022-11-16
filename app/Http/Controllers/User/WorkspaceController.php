<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkspaceController extends Controller
{
    public function index()
    {
        $workspaces = Workspace::all();
        return view('workspaces.index', compact('workspaces'));
    }

    public function store(Request $request)
    { 
        Workspace::create([
            'user_id' => Auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('workspace.index');
    }

    public function show(Workspace $workspace)
    {
        $tasks = Task::all();
        return view('workspaces.show', compact('workspace','tasks'));
    }

    public function delete(Workspace $workspace)
    {
        $workspace->delete();
        return to_route('workspace.index');
    }

    //API
    public function all()
    {
        $workspace = Workspace::all();

        return response()->json([
            'message' => 'Success',
            'data' => $workspace,
        ]);
        
    }

    public function storeApi(Request $request)
    {
        $workspace = Workspace::create([ //mass assign
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'data' => $workspace,
            'message' => 'Berjaya create',
        ]);
    }
}
