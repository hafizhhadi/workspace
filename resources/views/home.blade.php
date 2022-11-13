@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>          
</div>

<br>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Workspace') }}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createworkspace"><i class="fa fa-plus-square"></i>
                    Add Workspace
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="createworkspace" tabindex="-1" aria-labelledby="createworkspacelabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createworkspacelabel">Create new workspace</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('workspace:store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Workspace Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" rows="7" name="description" placeholder="Workspace Description" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
            <div class="card-body">
                {{-- @if( session()->has('alert-message'))
                    <div class="alert {{ session()->get('alert-type') }}">
                        {{ session()->get('alert-message') }}
                    </div>
                @endif --}}
                {{-- @if(count($workspaces)) --}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($workspaces as $workspace)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $workspace->name }}</td>
                                    <td>{{ $workspace->description }}</td>  
                                    <td><a href="{{ route('workspace:show',$workspace) }}" class="btn btn-success">Show</a>
                                        <a onclick="return confirm('Are you sure to delete workspace?')" href="#" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- @else --}}
                {{-- <p class="text-center mt-3">No workspace yet! Please create new workspace </p> --}}
                {{-- @endif --}}
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-header">{{ __('Deadline Workspace') }}</div>

            <div class="card-body">
                {{-- @foreach ( $deadline_tasks as $deadline)
                    <p>{{ $loop->iteration }}. {{ $deadline->name }}</p>
                @endforeach --}}
            </div>
        </div>
    </div>
</div>
@endsection
