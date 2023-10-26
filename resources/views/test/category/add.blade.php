@extends('test.layouts.main')

@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row center">
                <div class="col-lg-12">
                    <div class="card card-border-color card-border-color-primary">
                        <div class="card-header card-header-divider"> Add Category</div>
                        <div class="card-body">
                            <form action="{{ url('category/store') }}" method="POST">
                                @csrf
                                <div class="form-group pt-2">
                                    <label for="inputEmail">Category</label>
                                    <input class="form-control" type="text" name="category"
                                        placeholder="Category">
                                        @if ($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-right">
                                            <button class="btn btn-space btn-primary float-left" type="submit">ADD</button>

                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
