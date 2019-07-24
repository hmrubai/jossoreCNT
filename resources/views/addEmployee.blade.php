@extends('layouts.master') @section('content') <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body"> 
                  @if(session('success')) <div
                        class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Congrats! </strong> {{session('success')}} </div>
                    <script>
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: 'The Employee has been added successfully.',
                            showConfirmButton: false,
                            timer: 5000
                        });

                    </script> 
                    @endif 
                    <form action="{{ route('add-employee') }}" class="form-horizontal"
                        data-toggle="validator" role="form" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8"> @csrf <fieldset>
                            <legend> Employee Information </legend>
                            <div class="dropdown-divider"></div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="employee_id" class="">Employee ID</label>
                                    <input id="employee_id" class="form-control" required="required"
                                        placeholder="Employee ID" name="employee_id" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="employee_name" class="">Employee Name</label>
                                    <input id="employee_name" class="form-control" required="required"
                                        placeholder="Employee Name" name="employee_name" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="email" class="">Email</label>
                                    <input id="email" class="form-control" placeholder="Email" name="employee_email"
                                        type="email">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="phone" class="">Phone</label>
                                    <input id="phone" class="form-control" placeholder="Phone No."  required="required" name="employee_phone"
                                        type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="Address" class="">Address</label>
                                    <input id="Address" class="form-control" placeholder="Address"
                                        name="employee_address" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="joining_date" class="">Joining Date</label>
                                    <input id="joining_date" data-date="" data-date-format="DD-MM-YYYY" class="form-control" placeholder="Joining Date" name="employee_joining_date" type="date">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="Department" class="">Department</label>
                                    <input id="Department" class="form-control" placeholder="Department"
                                        name="employee_department" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="Designation" class="">Designation</label>
                                    <input id="Designation" class="form-control" placeholder="Designation"
                                        name="employee_designation" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="labelfor" class="">Picture</label>
                                    <input type="file" id="picture" class="form-control" placeholder="Picture"
                                        name="picture">
                                    <span class="help-block red" style="font-size:12px;">Only .pdf, .jpg, .png, .jpeg
                                        file and max file size 10MB</span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="labelfor" class="">Fingureprint</label>
                                    <input type="file" id="fingure_print" class="form-control"
                                        placeholder="Fingure Print" name="fingure_print">
                                    <span class="help-block red" style="font-size:12px;">Only .pdf, .jpg, .png, .jpeg
                                        file and max file size 10MB</span>
                                </div>
                            </div>
                        </fieldset>
                        <div class="dropdown-divider"></div>
                        <div class="form-group">
                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id">
                          <div class="col-md-4">
                            <button id="btnContact" class="btn btn-primary">Save</button>
                            <span class="help-block"><small> </small></span>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="#"
                    target="_blank">Jashore Cantonment</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="#"
                    target="_blank">Cerebrum Technology Limited</a></span>
        </div>
    </footer>
    <script>
      document.getElementById('joining_date').valueAsDate = new Date();
    </script>
</div> @endsection
