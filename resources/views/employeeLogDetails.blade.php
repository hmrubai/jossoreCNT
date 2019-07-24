@extends('layouts.master') 
@section('content') 
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body"> 
                    @if(session('success')) 
                      <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Congrats! </strong> {{session('success')}} 
                      </div>
                      <script>
                          Swal.fire({
                              position: 'top-end',
                              type: 'success',
                              title: 'The Log has been updated successful.',
                              showConfirmButton: false,
                              timer: 5000
                          });
                      </script> 
                    @endif 
                    <div class="row">
                      <div class="col-lg-3">
                          Employee Log List
                      </div>
                      <div class="col-lg-9">
                        <div class="float-right col-lg-12">
                          <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group col-lg-12">
                                    <label for="add_in_time">Select Employee</label>
                                    <select class="form-control" required="required" name="employee_id" id="employee_id">
                                        <option value="">-Select-</option>
                                        <?php
                                        foreach($employees as $employee):  
                                        ?>
                                          <option value="<?php echo $employee->id; ?>"><?php echo $employee->employee_id . " - " . $employee->name; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group col-lg-12">
                                    <label for="start_date">Start Date</label>
                                    <input id="start_date" data-date="" data-date-format="DD-MM-YYYY" class="form-control" placeholder="Start Date" name="start_date" type="date">
                                    <script>
                                      document.getElementById('start_date').valueAsDate = new Date();
                                    </script>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group col-lg-12">
                                    <label for="end_date">End Date</label>
                                    <input id="end_date" data-date="" data-date-format="DD-MM-YYYY" class="form-control" placeholder="End Date" name="end_date" type="date">
                                    <script>
                                      document.getElementById('end_date').valueAsDate = new Date();
                                    </script>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <br/>
                                <button type="button" onclick="filterLogList()" class="btn btn-success btn-fw float-right"> <i class="mdi mdi-note-plus"></i> Search</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Designation</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>In Time</th>
                                <th>Out Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ajax_tbody"></tbody>
                    </table>
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
        function filterLogList(){
            var employee_id = $("#employee_id").val();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            if(employee_id && start_date && end_date){
              axios.post('/employee-log-details', {
                start_date: start_date,
                end_date: end_date,
                employee_id: employee_id,
                '_token': '<?= csrf_token() ?>',
              })
              .then(function (response) {
                var data = response.data;

                var JStbody = '';
                $.each(data, function (index, value) {
                  JStbody += '<tr><td>' + value.name + '</td> <td>' + value.designation +'</td> <td>' + value.phone + '</td><td>' + value.log_date + '</td><td>' + value.log_in_time + '</td><td>' + value.log_out_time + '</td><td>Action</td></tr>';
                });
                $("#ajax_tbody").html(JStbody);
              })
              .catch(function (error) {
                console.log(error);
              });
            }
            else{
              Swal.fire({
                position: 'top-end',
                type: 'error',
                title: 'Please select all the fields!',
                showConfirmButton: false,
                timer: 5000
              });
            }
        }

        function AddLogInfo() {
            var employee_id = $("#employee_id").val();
            var in_time = $("#add_in_time").val();
            var out_time = $("#add_out_time").val();
            var log_date = $("#add_log_date").val();
            if(employee_id && in_time && log_date){
              axios.post('/add-employee-log', {
                in_time: in_time,
                out_time: out_time,
                log_date: log_date,
                employee_id: employee_id,
                '_token': '<?= csrf_token() ?>',
              })
              .then(function (response) {
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Log has been added successfully.',
                  showConfirmButton: false,
                  timer: 5000
                });
                setTimeout(function() { location.reload(); }, 3000);
              })
              .catch(function (error) {
                console.log(error);
              });
            }
            else{
              Swal.fire({
                  position: 'top-end',
                  type: 'error',
                  title: 'Please select all the fields!',
                  showConfirmButton: false,
                  timer: 5000
                });
            }
        }

        function UpdateLogInfo(log_id) {
            var in_time = $("#in_time_" + log_id).val();
            var out_time = $("#out_time_" + log_id).val();

            if(in_time && out_time){
              axios.post('/update-employee-log', {
                in_time: in_time,
                out_time: out_time,
                log_id: log_id,
                '_token': '<?= csrf_token() ?>'
              })
              .then(function (response) {
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Log has been added successfully.',
                  showConfirmButton: false,
                  timer: 5000
                });
                setTimeout(function() { location.reload(); }, 3000);
              })
              .catch(function (error) {
                console.log(error);
              });
            }
            else{
              Swal.fire({
                  position: 'top-end',
                  type: 'error',
                  title: 'Please select all the fields!',
                  showConfirmButton: false,
                  timer: 5000
                });
            }
        }
        $("#emp_log_details").addClass("active");
    </script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            background-color: #229f5e;
            color: white;
        }

        th,
        td {
            padding: 6px;
            text-align: left;
            font-weight: 300;
            font-size: 14px;
            border: 1px solid #ddd;
        }

        tr:hover {
            background-color: #d6d5d3;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .custom-modal-size{
          width: 700px !important;
        }
        .custom-dialog-position{
          left: -100px !important;
        }

        .user_image_shadow{
          box-shadow: 0px 2px 4px -1px rgba(0,0,0,0.2), 0px 4px 5px 0px rgba(0,0,0,0.14), 0px 1px 10px 0px rgba(0,0,0,0.12);
        }
        .user-img-center{
          display:block;
          margin:auto;
        }
        /** Clock */
        *,
        *:before,
        *:after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :focus {
            outline: none
        }

        ::-moz-focus-inner {
            border: 0
        }

        div.table {
            position: relative;
            display: table;
        }

        .center {
            text-align: center
        }

        .right {
            position: absolute;
            right: 5px
        }

        span.icon {
            position: absolute;
            right: 1px;
            top: 1px;
            padding: 5px;
            background-color: #eee;
            border-left: 1px solid #ccc;
        }

        @-moz-document url-prefix() {
            span.icon {
                right: 2px;
                top: 3px;
            }
        }

        input {
            padding: 5px 0;
            font-size: 1.5em;
            font-family: inherit;
            width: 120px;
        }

        a.icon {
            display: table-cell;
            width: 32px;
            text-indent: -9999px;
            border: 1px solid transparent;
        }

        a.icon:hover {
            cursor: pointer;
            background-color: #eee;
            border: 1px solid #ccc;
        }

        a.link {
            text-decoration: none;
            color: inherit;
            border-bottom: 1px dotted #333;
        }

        a.link:hover {
            border-bottom: 1px solid #333;
        }

        i.icon {
            display: block;
            width: 32px;
            height: 36px;
        }

        i.icon,
        a.icon {
            background: url("https://cdn.rawgit.com/jonataswalker/timepicker.js/master/examples/clock.png") no-repeat center center;
        }

    </style>
</div> 
@endsection
