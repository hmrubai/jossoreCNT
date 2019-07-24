@extends('layouts.master') @section('content') <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body"> @if(session('success')) <div
                        class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Congrats! </strong> {{session('success')}} </div>
                    <script>
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: 'The Visitor has been added successfully.',
                            showConfirmButton: false,
                            timer: 5000
                        });

                    </script> @endif <form action="{{ route('add-visitor') }}" class="form-horizontal"
                        data-toggle="validator" role="form" enctype="multipart/form-data" method="post"
                        accept-charset="utf-8"> @csrf <fieldset>
                            <legend> Visitor Information </legend>
                            <div class="dropdown-divider"></div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="visitor_name" class="">Visitor Name</label>
                                    <input id="visitor_name" class="form-control" required="required"
                                        placeholder="Visitor Name" name="visitor_name" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="email" class="">Email</label>
                                    <input id="email" class="form-control" placeholder="Email" name="visitor_email"
                                        type="email">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="phone" class="">Phone</label>
                                    <input id="phone" class="form-control" placeholder="Phone No."  required="required" name="visitor_phone"
                                        type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="profession" class="">Profession</label>
                                    <input id="profession" class="form-control" placeholder="Profession"
                                        name="visitor_profession" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="Designation" class="">Designation</label>
                                    <input id="Designation" class="form-control" placeholder="Designation"
                                        name="visitor_designation" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="Address" class="">Address</label>
                                    <input id="Address" class="form-control" placeholder="Address"
                                        name="visitor_address" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="driver_name" class="">Driver Name</label>
                                    <input id="driver_name" class="form-control" placeholder="Driver Name"
                                        name="visitor_driver_name" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="driver_no" class="">Driver No</label>
                                    <input id="driver_no" class="form-control" placeholder="Driver Phone No"
                                        name="visitor_driver_no" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="vehicle_no" class="">Vehicle No</label>
                                    <input id="vehicle_no" class="form-control" placeholder="Vehicle No"
                                        name="visitor_vehicle_no" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="visit_from" class="">From</label>
                                    <input id="visit_from" class="form-control" placeholder="From"
                                        name="visitor_visit_from" type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="visit_to" class="">To</label>
                                    <input id="visit_to" class="form-control" placeholder="To" name="visitor_visit_to"
                                        type="text">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="visit_purpose" class="">Purpose</label>
                                    <input id="visit_purpose" class="form-control" placeholder="Purpose"
                                        name="visitor_visit_purpose" type="text">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="visit_date" class="">Log Date</label>
                                    <input id="visit_date" data-date="" data-date-format="DD-MM-YYYY" class="form-control" placeholder="Log Date" name="visitor_visit_date" type="date">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="visit_in" class="">Log In Time</label>
                                    <input id="visit_in" class="form-control" placeholder="Log In Time"
                                        name="visitor_visit_in" type="time">
                                </div>
                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label for="visit_out" class="">Log Out Time</label>
                                    <input id="visit_out" class="form-control" placeholder="Log Out Time"
                                        name="visitor_visit_out" type="time">
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
      document.getElementById('visit_date').valueAsDate = new Date();
      var today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      var dateTime = date+' '+time;
      document.getElementById('visit_in').value = time;
    </script>
</div> @endsection
