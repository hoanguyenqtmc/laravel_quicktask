@extends('layouts.masters')
@section('title')
    Tasks
@endsection

@section('content')
    <div class="col-md-6 taskscenter">
        {{-- show errors --}}
        @include('errors.errors')

        {{-- new tasks form --}}
        <form action="{{Route('store')}}" method="POST" class="form-horizontal  pl-0">
            @csrf
            <div class="form-group has-success">
                <label for="task" class="control-label">Task</label>
                <input type="text" name="name" id="task-name" class="form-control is-valid ">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add Task</button>
            </div>
        </form>
        {{-- end tasks form --}}

        @if (count($tasks) > 0)
            <table class="table table-hover ">
                        <!-- Table Headings -->
                        <thead class="table-primary">
                            <th>Task</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </thead>
        
                        <!-- Table Body -->
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr class="">
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $task->created_at }}</div>
                                    </td>
        
                                    <td>
                                        <a name="" id="" class="btn btn-danger" href="{{Route('destroy', $task->id)}}" role="button">Delete</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$task->id}}">
                                            Edit
                                        </button>
                                        
                                        <!-- Modal -->
                                        <form action="{{Route('update', $task->id)}}" method="post">
                                            @csrf
                                        <div class="modal" id="edit{{$task->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit {{$task->id}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" id="" class="form-control" value="{{$task->name}}">
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
     
        @endif
    </div>
@endsection