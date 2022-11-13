@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Tasks') }}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createtask">
                    Add Task
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="createtask" tabindex="-1" aria-labelledby="createtasklabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createtasklabel">Create New Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('task:store', $workspace) }}">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Task Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" rows="7" name="description" placeholder="Task Description" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="date">Due Date</label>
                                    <input type="date" class="form-control" id="due_date" name="due_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="date">Due Time</label>
                                    <input type="time" class="form-control" id="due_time" name="due_time" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                    </div>
                </div>
            </div>
    
            <div class="card-body">
                {{-- @if( session()->has('alert-message'))
                    <div class="alert {{ session()->get('alert-type') }}">
                        {{ session()->get('alert-message') }}
                    </div>
                @endif --}}
                {{-- @if(count($tasks)) --}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date Line</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->status }}</td> 
                                    <td>{{ $task->description }}</td>  
                                    <td>{{ $task->a }}</td> 
                                    <td><a href="#" class="btn btn-success">Show</a>
                                        <a onclick="return confirm('Are you sure to delete task?')" href="#" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- @else
                <p class="text-center mt-3">No workspace yet! Please create new workspace </p>
                @endif --}}
            </div>
        </div>
    </div>
</div>
@endsection