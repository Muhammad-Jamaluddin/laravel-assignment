@extends('test.layouts.main')

@section('content')
<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Tasks</h2>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-header">
                        View All Tasks List
                        <a href="{{ url('task/add') }}" class="btn btn-primary float-right">Add Task</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" id="searchTasks" class="form-control" placeholder="Search Tasks">
                            </div>
                            <div class="col-md-3">
                                <select id="searchCategory" class="form-control">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-fw-widget" id="table3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Task Name</th>
                                    <th>Task Description</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tasks as $task)
                                    <tr class="odd gradeX">
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->task_name }}</td>
                                        <td>{{ $task->task_description }}</td>
                                        <td>{{ $task->category }}</td>
                                        @if($task->status == "In Progress")
                                            <td class="text text-info">{{ $task->status }}</td>
                                        @elseif($task->status == "New")
                                            <td class="text text-primary">{{ $task->status }}</td>
                                        @elseif($task->status == "Completed")
                                            <td class="text text-success">{{ $task->status }}</td>
                                        @elseif($task->status == "Block")
                                            <td class="text text-danger">{{ $task->status }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ url('task/edit') }}/{{ $task->id }}" class="btn btn-success">Edit</a>
                                            <a href="{{ url('task/delete') }}/{{ $task->id }}"  data-confirm="Are you sure to delete this item?"
                                            onclick="return myFunction();" class="btn btn-outline-danger">Delete</a>
                                           
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">Not Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {
    if (!confirm("Are You Sure to delete this"))
        event.preventDefault();
}

document.addEventListener("DOMContentLoaded", function () {
    const searchTasks = document.getElementById("searchTasks");
    const searchCategory = document.getElementById("searchCategory");
    
    const tableRows = document.querySelectorAll("table tbody tr");

    function applyFilter() {
        const searchTerm = searchTasks.value.trim().toLowerCase();
        const selectedCategory = searchCategory.value;

        tableRows.forEach(row => {
            const rowText = Array.from(row.cells).map(cell => cell.textContent.trim().toLowerCase());
            const categoryCell = row.cells[3].textContent.trim();

            const matchesSearchTerm = searchTerm === '' || rowText.some(text => text.includes(searchTerm));
            const matchesCategory = selectedCategory === '' || categoryCell === selectedCategory;

            row.style.display = matchesSearchTerm && matchesCategory ? 'table-row' : 'none';
        });
    }

    searchTasks.addEventListener("input", applyFilter);
    searchCategory.addEventListener("change", applyFilter);
});
</script>
@endsection
