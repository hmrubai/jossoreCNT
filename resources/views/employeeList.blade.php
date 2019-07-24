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
                            title: 'The Log has been updated successful.',
                            showConfirmButton: false,
                            timer: 5000
                        });

                    </script> 
                    @endif 
                    Employee List
                    <br/><br/> 
                    <table>
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Phone No.</th>
                                <th>Address</th>
                                <th>Joining Date</th>
                                <th>Department</th>
                                <th>designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> <?php 
                          foreach($employees as $employee):  ?> <tr>
                                <td>
                                    <?php 
                                    if($employee->picture){
                                    ?>
                                        <img class="img-xs rounded-circle" src="files/employee/profile/<?php echo $employee->picture; ?>" alt="Profile">
                                    <?php 
                                    }
                                    else{
                                      ?>
                                        <img class="img-xs rounded-circle" src="images/user_icon.png" alt="Profile">
                                      <?php 
                                    }
                                  ?>
                                </td>
                                <td><?php echo $employee->name; ?></td>
                                <td><?php echo $employee->phone; ?></td>
                                <td><?php echo $employee->address; ?></td>
                                <td><?php echo $employee->joining_date; ?></td>
                                <td><?php echo $employee->department; ?></td>
                                <td><?php echo $employee->designation; ?></td>
                                <td>
                                    <button type="button" data-toggle="modal"
                                        data-target="#detailsModal_<?php echo $employee->id; ?>"
                                        class="btn btn-inverse-warning btn-fw">Details</button>
                                    <div class="modal fade" id="detailsModal_<?php echo $employee->id; ?>"
                                        tabindex="-1" role="dialog"
                                        aria-labelledby="detailsModal_<?php echo $employee->id; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog custom-dialog-position" role="document">
                                            <div class="modal-content custom-modal-size">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6 img">
                                                                <table>
                                                                  <tr>
                                                                    <td>
                                                                        <?php 
                                                                          if($employee->picture){
                                                                          ?>
                                                                              <img src="files/employee/profile/<?php echo $employee->picture; ?>" width="68%"  alt="Profile" class="img-rounded user_image_shadow user-img-center">
                                                                          <?php 
                                                                          }
                                                                          else{
                                                                            ?>
                                                                              <img src="images/user_logo.svg" width="68%" alt="Profile"  class="img-rounded user_image_shadow user-img-center">
                                                                            <?php 
                                                                          }
                                                                        ?>
                                                                    </td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>
                                                                      
                                                                        <?php 
                                                                          if($employee->fingure_print){
                                                                          ?>
                                                                              <img src="files/employee/fingureprint/<?php echo $employee->fingure_print; ?>" width="68%"  alt="FingurePrint" class="img-rounded user_image_shadow user-img-center">
                                                                          <?php 
                                                                          }
                                                                          else{
                                                                            ?>
                                                                              <img src="images/fingerprint_icon.png" width="68%" alt="FingurePrint"  class="img-rounded user_image_shadow user-img-center">
                                                                            <?php 
                                                                          }
                                                                        ?>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                            </div>
                                                            <div class="col-md-6 details">
                                                                <blockquote>
                                                                    <h5><?php echo $employee->name; ?></h5>
                                                                    <small>
                                                                      <cite title="<?php echo $employee->name; ?>">
                                                                        <?php echo $employee->designation; ?>, 
                                                                        <?php echo $employee->department; ?>
                                                                            <i class="icon-map-marker"></i>
                                                                      </cite>
                                                                    </small>
                                                                </blockquote>
                                                                <table>
                                                                    <tr>
                                                                      <td>Employee ID:</td>
                                                                      <td><?php echo $employee->employee_id; ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>Designation:</td>
                                                                      <td><?php echo $employee->designation; ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>Department:</td>
                                                                      <td><?php echo $employee->department; ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>Email:</td>
                                                                      <td><?php echo $employee->email; ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>Phone:</td>
                                                                      <td><?php echo $employee->phone; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>Phone:</td>
                                                                      <td><?php echo $employee->address; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>Joining Date:</td>
                                                                      <td><?php echo $employee->joining_date; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" data-toggle="modal"
                                        data-target="#LogUpdateModal_<?php echo $employee->id; ?>"
                                        class="btn btn-inverse-info btn-fw">Entry Log</button>
                                    <div class="modal fade" id="LogUpdateModal_<?php echo $employee->id; ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="LogUpdateModal_<?php echo $employee->id; ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Entry Log:</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6 img">
                                                                <blockquote>
                                                                    <h5><?php echo $employee->name; ?></h5>
                                                                    <small>
                                                                      <cite title="<?php echo $employee->name; ?>">
                                                                        <?php echo $employee->designation; ?>, 
                                                                        <?php echo $employee->department; ?>
                                                                            <i class="icon-map-marker"></i>
                                                                      </cite>
                                                                    </small>
                                                                </blockquote>
                                                            </div>
                                                            <div class="col-md-6 details">
                                                                <p> <?php echo $employee->employee_id; ?>
                                                                <br><?php echo $employee->email; ?> 
                                                                <br><?php echo $employee->phone; ?>
                                                                <br><?php echo $employee->joining_date; ?> </p>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <table>
                                                                    <tr>
                                                                      <td>Date:</td>
                                                                      <td>
                                                                          <input id="log_date_<?php echo $employee->id; ?>" data-date="" data-date-format="DD-MM-YYYY" class="form-control" placeholder="Log Date" name="log_date" type="date" readonly>
                                                                          <script>
                                                                            document.getElementById('log_date_<?php echo $employee->id; ?>').valueAsDate = new Date();
                                                                          </script>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>In Time:</td>
                                                                      <td>
                                                                          <input type="text" id="in_time_<?php echo $employee->id; ?>" class="time-picker form-control" name="3" readonly>
                                                                          <script>
                                                                            $('#in_time_<?php echo $employee->id; ?>').hunterTimePicker({
                                                                              callback: function(e){
                                                                                e.val();
                                                                              }
                                                                            });
                                                                            $(".time-picker").hunterTimePicker();
                                                                          </script>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>Out Time:</td>
                                                                      <td>
                                                                          <input type="text" id="out_time_<?php echo $employee->id; ?>" class="time-picker form-control" name="3" readonly>
                                                                          <script>
                                                                            $('#out_time_<?php echo $employee->id; ?>').hunterTimePicker({
                                                                              callback: function(e){
                                                                                e.val();
                                                                              }
                                                                            });
                                                                            $(".time-picker").hunterTimePicker();
                                                                          </script>
                                                                      </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button id="btnContact" onclick="addLogInfo(<?php echo $employee->id; ?>)" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr> <?php
                          endforeach;  
                        ?> </tbody>
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
        function addLogInfo(Log_id) {
            var in_time = $("#in_time_" + Log_id).val();
            var out_time = $("#out_time_" + Log_id).val();
            var log_date = $("#log_date_" + Log_id).val();

            axios.post('/add-employee-log', {
              in_time: in_time,
              out_time: out_time,
              log_date: log_date,
              employee_id: Log_id,
              '_token': '<?= csrf_token() ?>',
            })
            .then(function (response) {
              Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Log has been updated successful.',
                showConfirmButton: false,
                timer: 5000
              });
              setTimeout(function() { location.reload(); }, 3000);
            })
            .catch(function (error) {
              console.log(error);
            });
        }
        $("#visitor_log").removeClass("active");
        $("#emp_list").addClass("active");
        $("#emp_log").removeClass("active");
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
