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

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $workspace = new Workspace();
        $workspace->user_id = Auth::id();
        $workspace->name = $request->name;
        $workspace->description = $request->description;
        $workspace->save();
        return redirect()->route('home');
    }

    public function show(Workspace $workspace)
    {
        // $tasks = Task::where('id',$workspace->id)->get();
        $tasks = $workspace->tasks;
        dd($tasks);
        return view('workspaces.show', compact('workspace','tasks'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

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
