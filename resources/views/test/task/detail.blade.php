@extends('lms.layouts.main')

@section('content')
    <style>
        /* Your existing styles */
        /* ... */

        /* Additional styles for the table */
        .table-container {
            margin-top: 20px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        .table-container th,
        .table-container td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table-container th {
            background-color: #f5f5f5;
        }

        /* Styling for table content */
        .table-container td {
            font-size: 14px;
            color: #333;
        }
    </style>


    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="table-container">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <div class="row">
                                    <div class="col-md-9">
                                        <h1 style="color: #322653; font-weight:400;">Enquiry</h1>
                                    </div>

                                </div>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Client Name</strong></td>
                                    <td>{{ $leaddetails->name }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>{{ $leaddetails->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone</strong> </td>
                                    <td>{{ $leaddetails->phone }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Parent category</strong></td>
                                    <td>{{ $leaddetails->parentcategory }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Category</strong></td>
                                    <td>{{ $leaddetails->category }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Interested Product</strong></td>
                                    <td>{{ $leaddetails->productname }}</td>
                                </tr>

                                <td><strong>Description</strong></td>
                                <td>{{ $leaddetails->lead_description }}</td>

                                <tr>

                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="table-container">
                <div class="card">
                    <div class="card-body">
                <table class="table table-sm">
                    <thead>
                       <div class="row">

                                    <div class="col-md-9">
                                        <h1 style="color: #322653; font-weight: 400;">Follow Up</h1>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <button class="btn btn-primary" onclick="sendEmail('{{ $leaddetails->email }}')">
                                            Send Email
                                        </button>
                                    </div>
                        </div>
                    </thead>
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>FollowUp Date</th>
                            <th>Reason</th>
                            <th>Remarks</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($followups as $follow_up_detail)
                            <tr>
                                <td>{{ $follow_up_detail->f_id }}</td>
                                <td>{{ $follow_up_detail->datetime }}</td>
                                <td>{{ $follow_up_detail->reason }}</td>
                                <td>{{ $follow_up_detail->remarks }}</td>
                                <td>
                                    @if ($follow_up_detail->followstatus == 'Done')
                                        <span
                                            class="badge badge-success">{{ $follow_up_detail->followstatus }}</span>
                                    @else
                                        <span
                                            class="badge badge-warning">{{ $follow_up_detail->followstatus }}</span>
                                    @endif
                                </td>

                                <td>

                                    @if ($follow_up_detail->followstatus == 'pending')
                                        <button type="button" class="btn btn-danger text-white"
                                            onclick="showFollow('{{ $follow_up_detail->id }}','{{ $follow_up_detail->date_of_followup }}','{{ $follow_up_detail->follow_reason }}')">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-info text-white"
                                            onclick="takeFollow('{{ $follow_up_detail->id }}')"> Take
                                        </button>
                                    @else
                                        <button class="btn btn-primary">Completed</button>
                                    @endif

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan=4>Followup Not Record</td>
                            </tr>
                        @endforelse
                        <script>
                            function showFollow(id, date, reason) {

                                document.getElementById('date').value = date;
                                document.getElementById('reason').value = reason;
                                document.getElementById('id').value = id;

                                var modal = document.getElementById('exampleModaleditf');
                                $(modal).modal('show');
                            }

                            function takeFollow(id) {


                                document.getElementById('take_id').value = id;

                                var modal = document.getElementById('exampleModaltakef');
                                $(modal).modal('show');
                            }
                        </script>
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="create_appoinment" method="post" action="{{ url('admin/followup/store') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Record Follow Ups</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="lead_id" value="{{ $leaddetails->l_id }}" />
                        <div class="row">


                            <div class="col-md-6" id="hide">
                                <div class="form-group">
                                    <label for="inputEmail">FollowUp Date</label>
                                    <input type="datetime-local" class="form-control" min="{{ date('Y-m-d') }}"
                                        name="datetime" placeholder="Follow up Date">
                                    @if ($errors->has('datetime'))
                                        <span class="text-danger">{{ $errors->first('datetime') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" id="hidee">
                                <div class="form-group">
                                    <label for="inputEmail">FollowUp Reason</label>
                                    <input type="text" class="form-control" value="{{ old('reason') }}" name="reason"
                                        placeholder="Follow reason">
                                    @if ($errors->has('reason'))
                                        <span class="text-danger">{{ $errors->first('reason') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_appoinment">Record Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModaleditf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeleditf"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="create_appoinment" method="post" action="{{ url('followup/update') }}">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Follow Ups</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="lead_id" value="{{ $leaddetails->l_id }}" />
                        <input type="hidden" name="id" id="id" />

                        <div class="row">


                            <div class="col-md-6" id="hide">
                                <div class="form-group">
                                    <label for="inputEmail">FollowUp Date</label>
                                    <input type="date" class="form-control" id="date" min="{{ date('Y-m-d') }}"
                                        name="datetime" placeholder="Follow up Date">
                                    @if ($errors->has('datetime'))
                                        <span class="text-danger">{{ $errors->first('datetime') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6" id="hidee">
                                <div class="form-group">
                                    <label for="inputEmail">FollowUp Reason</label>
                                    <input type="text" class="form-control" id="reason"
                                        value="{{ old('reason') }}" name="reason" placeholder="Follow Reason">
                                    @if ($errors->has('reason'))
                                        <span class="text-danger">{{ $errors->first('reason') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_appoinment">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModaltakef" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabeltakef" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="create_appoinment" method="post" action="{{ url('admin/followup/take') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Take Follow Ups</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="lead_id" value="{{ $leaddetails->l_id }}" />
                        <input type="hidden" name="id" id="take_id" />
                        <div class="row">
                            <div class="col-md-12" id="hidee">
                                <div class="form-group">
                                    <label for="inputEmail">FollowUp Remarks</label>
                                    <input type="text" class="form-control" value="{{ old('remarks') }}"
                                        name="remarks" placeholder="Follow Remarks">
                                    @if ($errors->has('remarks'))
                                        <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_appoinment">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "showDuration": "3000",
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "showDuration": "3000",
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endsection
