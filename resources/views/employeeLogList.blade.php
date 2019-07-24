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
                    Employee Log List  
                    <button type="button" data-toggle="modal" data-target="#addLogModal" class="btn btn-success btn-fw float-right"> <i class="mdi mdi-note-plus"></i> Add Log</button>
                    <div class="modal fade" id="addLogModal" tabindex="-1" role="dialog" aria-labelledby="addLogModal" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="addLogModal">Log Time Entry</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="card">
                                <div class="card-body">
                                  <form action="#" class="form-horizontal" role="form" enctype="multipart/form-data" method="post"> 
                                    @csrf
                                    <div class="dropdown-divider"></div>
                                    <div class="row">
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
                                        <div class="form-group col-lg-12">
                                            <label for="add_in_time">Date</label>
                                            <input id="add_log_date" data-date="" data-date-format="DD-MM-YYYY" class="form-control" placeholder="Log Date" name="log_date" type="date">
                                            <script>
                                              document.getElementById('add_log_date').valueAsDate = new Date();
                                            </script>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="add_in_time">In Time</label>
                                                <input type="text" id="add_in_time" class="time-picker form-control" name="3" value="" readonly>
                                              <script>
                                                $('#add_in_time').hunterTimePicker({
                                                  callback: function(e){
                                                    e.val();
                                                  }
                                                });
                                                $(".time-picker").hunterTimePicker();
                                              </script>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="add_out_time">Out Time</label>
                                                <input type="text" id="add_out_time" class="time-picker form-control" name="3" value="" readonly>
                                              <script>
                                                $('#add_out_time').hunterTimePicker({
                                                  callback: function(e){
                                                    e.val();
                                                  }
                                                });
                                                $(".time-picker").hunterTimePicker();
                                              </script>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" onclick="AddLogInfo()" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <br/><br/>
                    <table>
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Employee Name</th>
                                <th>Designation</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>In Time</th>
                                <th>Out Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                          <?php
                          foreach($employee_log as $log):  ?> <tr>
                                <td>
                                    <?php 
                                    if($log->picture){
                                    ?>
                                        <img class="img-xs rounded-circle" src="files/employee/profile/<?php echo $log->picture; ?>" alt="Profile">
                                    <?php 
                                    }
                                    else{
                                      ?>
                                        <img class="img-xs rounded-circle" src="images/user_icon.png" alt="Profile">
                                      <?php 
                                    }
                                  ?>
                                </td>
                                <td><?php echo $log->name; ?></td>
                                <td><?php echo $log->designation; ?></td>
                                <td><?php echo $log->phone; ?></td>
                                <td><?php echo $log->log_date; ?></td>
                                <td>
                                    <?php
                                    if($log->log_in_time){
                                      echo date('h:i:s a', strtotime($log->log_in_time));
                                    }
                                    ?>
                                </td>
                                <td>
                                  <?php
                                    if($log->log_out_time){
                                      echo date('h:i:s a', strtotime($log->log_out_time));
                                    }
                                  ?>
                                </td>
                                <td>
                                  <button type="button"  data-toggle="modal" data-target="#LogUpdateModal_<?php echo $log->id; ?>" class="btn btn-inverse-warning btn-fw">Update Log</button>
                                  <div class="modal fade" id="LogUpdateModal_<?php echo $log->id; ?>" tabindex="-1" role="dialog" aria-labelledby="LogUpdateModal_<?php echo $log->id; ?>" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="LogUpdateModal_<?php echo $log->id; ?>">Update Time Log</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="card">
                                                <div class="card-body">
                                                  <ul class="list-star">
                                                    <li>Name: <?php echo $log->name; ?></li>
                                                    <li>Phone: <?php echo $log->phone; ?></li>
                                                    <li>Date: <b><?php echo $log->log_date; ?></b></li>
                                                    <li>
                                                      In Time: <b>
                                                      <?php
                                                      if($log->log_in_time){
                                                        echo date('h:i:s a', strtotime($log->log_in_time));
                                                      }
                                                      ?></b>
                                                    </li>
                                                    <li>
                                                      Out Time: <b>
                                                      <?php
                                                        if($log->log_out_time){
                                                          echo date('h:i:s a', strtotime($log->log_out_time));
                                                        }
                                                      ?> </b>
                                                    </li>
                                                  </ul>
                                                  <form action="#" class="form-horizontal" role="form" enctype="multipart/form-data" method="post"> 
                                                    @csrf
                                                    <div class="dropdown-divider"></div>
                                                    <div class="row">
                                                        <div class="form-group col-lg-12">
                                                            <label for="in_time_<?php echo $log->id; ?>">In Time</label>
                                                                <input type="text" id="in_time_<?php echo $log->id; ?>" class="time-picker form-control" name="3" value="<?php echo $log->log_in_time; ?>" readonly>
                                                              <script>
                                                                $('#in_time_<?php echo $log->id; ?>').hunterTimePicker({
                                                                  callback: function(e){
                                                                    e.val();
                                                                  }
                                                                });
                                                                $(".time-picker").hunterTimePicker();
                                                              </script>
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label for="out_time_<?php echo $log->id; ?>">Out Time</label>
                                                                <input type="text" id="out_time_<?php echo $log->id; ?>" class="time-picker form-control" name="3" value="<?php echo $log->log_out_time; ?>" readonly>
                                                              <script>
                                                                $('#out_time_<?php echo $log->id; ?>').hunterTimePicker({
                                                                  callback: function(e){
                                                                    e.val();
                                                                  }
                                                                });
                                                                $(".time-picker").hunterTimePicker();
                                                              </script>
                                                        </div>

                                                    </div>
                                                  </form>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="UpdateLogInfo(<?php echo $log->id; ?>)" class="btn btn-primary">Update</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </td>
                            </tr> <?php
                          endforeach;  
                        ?> 
                        </tbody>
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
            console.log(log_id + " - " + in_time + " - " + out_time);
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
        $("#visitor_log").removeClass("active");
        $("#emp_list").removeClass("active");
        $("#emp_log").addClass("active");
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
