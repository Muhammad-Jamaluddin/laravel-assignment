@extends('test.layouts.main')

@section('content')
<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Category</h2>

    </div>
    <div class="main-content container-fluid">


        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-header"> View All Categories List
                    <a href="{{ url('category/add') }}" class="btn btn-primary float-right">Add Category</a>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-fw-widget" id="table3">
                            <thead>
                                <tr>

                                    <th>ID </th>
                                    <th>Category </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr class="odd gradeX">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category }}</td>
                                    <td>
                                        <a href="{{ url('category/edit') }}/{{ $category->id }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ url('category/delete') }}/{{ $category->id }}"
                                            data-confirm="Are you sure to delete this item?"
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
</script>
@endsection