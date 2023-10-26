@extends('test.layouts.main')

@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <h3 class="float-left"> Dashboard</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card ">
                        <div class="card-body" style="padding-block: 20px">
                            <div class="row text-center">
                                <div class="col-2 text-success">
                                    <div class="mb-3">
                                        <span class="font-size-lg">Total Task</span>
                                        <h3 class="font-weight-bold mb-0" id="">{{$totaltask}}</h3>
                                    </div>
                                </div>
                                <div class="col-2  text-primary">
                                    <div class="mb-3">
                                        <span class="font-size-lg">New Task</span>
                                        <h3 class="font-weight-bold mb-0" id="">{{$newtask}}</h3>
                                    </div>
                                </div>
                                <div class="col-2 text-secondary">
                                    <div class="mb-3">
                                        <span class="font-size-lg">InProggress Taks</span>
                                        <h3 class="font-weight-bold mb-0" id="">{{$inproggresstask}}</h3>
                                    </div>
                                </div>

                                <div class="col-2 text-success">
                                    <div class="mb-3">
                                        <span class="font-size-lg">Completed Taks</span>
                                        <h3 class="font-weight-bold mb-0" id="">{{$completetask}}</h3>
                                    </div>
                                </div>
                                <div class="col-2 text-danger">
                                    <div class="mb-3">
                                        <span class="font-size-lg">Block Task</span>
                                        <h3 class="font-weight-bold mb-0" id="">{{$blocktask}}</h3>
                                    </div>
                                </div>
                               
                               

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
