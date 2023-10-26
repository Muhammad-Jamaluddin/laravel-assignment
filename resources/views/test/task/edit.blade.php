@extends('test.layouts.main')

@section('content')

<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header card-header-divider"> Add Task</div>
                    <div class="card-body">
                        <form action="{{ url('task/update') }}/{{$edit->id}}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Task Name</label>
                                        <input class="form-control" type="text" name="taskname"
                                            value="{{$edit->task_name }}" placeholder="Name title">
                                        @if ($errors->has('taskname'))
                                        <span class="text-danger">{{ $errors->first('taskname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Task Description</label>
                                        <input class="form-control" type="text" name="taskdescription"
                                            value="{{ $edit->task_description }}" placeholder="Task Description ">
                                        @if ($errors->has('taskdescription'))
                                        <span class="text-danger">{{ $errors->first('taskdescription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control" id="category">
                                            <option value="">Selectb category</option>
                                            @foreach($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $edit->c_id ? 'selected' : '' }}>{{ $item->category }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estimated Hours</label>
                                        <input class="form-control" type="number" name="estimatedhour"
                                            value="{{ $edit->estimated_hour }}" placeholder="Task Estimated hour ">
                                        @if ($errors->has('estimatedhour'))
                                        <span class="text-danger">{{ $errors->first('estimatedhour') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Actual Hours </label>
                                        <input class="form-control" type="number" name="actualhour"
                                            value="{{ $edit->actual_hour }}" placeholder="Actual Hours ">
                                        @if ($errors->has('actualhour'))
                                        <span class="text-danger">{{ $errors->first('actualhour') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control" id="category">
                                            <option value="">Select Status</option>
                                            <option value="New"
                                                {{ $edit->status == 'New' ? 'selected' : '' }}>New</option>
                                            <option value="In Progress"
                                                {{ $edit->status == 'In Progress' ? 'selected' : '' }}>In
                                                Progress</option>
                                            <option value="Completed"
                                                {{ $edit->status == 'Completed' ? 'selected' : '' }}>Completed
                                            </option>
                                            <option value="Block"
                                                {{ $edit->status == 'Block' ? 'selected' : '' }}>Block
                                            </option>
                                        </select>

                                        @if ($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <p class="text-right">
                                    <button class="btn btn-space btn-warning " type="submit">ADD</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection