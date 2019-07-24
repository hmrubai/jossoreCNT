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
                        title: 'The Log has been updated successful.',
                        showConfirmButton: false,
                        timer: 5000
                    });

                </script> 
                @endif  
                  Visitor List
                  <br/><br/> 
                  <table>
                      <thead>
                        <tr>
                          <th>Picture</th>
                          <th>Name</th>
                          <th>Phone No.</th>
                          <th>Address</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Date</th>
                          <th>In Time</th>
                          <th>Out Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          foreach($visitors as $visitor):  ?>
                            <tr>
                              <td>
                                <?php 
                                  if($visitor->picture){
                                  ?>
                                      <img class="img-xs rounded-circle" src="files/visitor/profile/<?php echo $visitor->picture; ?>" alt="Profile">
                                  <?php 
                                  }
                                  else{
                                    ?>
                                      <img class="img-xs rounded-circle" src="images/user_icon.png" alt="Profile">
                                    <?php 
                                  }
                                ?>
                              </td>
                              <td><?php echo $visitor->name; ?></td>
                              <td><?php echo $visitor->phone; ?></td>
                              <td><?php echo $visitor->address; ?></td>
                              <td><?php echo $visitor->visit_from; ?></td>
                              <td><?php echo $visitor->visit_to; ?></td>
                              <td><?php echo $visitor->log_date; ?></td>
                              <td>
                                <?php
                                  if($visitor->log_in_time){
                                    echo date('h:i:s a', strtotime($visitor->log_in_time));
                                  }
                                ?>
                              </td>
                              <td>
                                <?php
                                  if($visitor->log_out_time){
                                    echo date('h:i:s a', strtotime($visitor->log_out_time));
                                  }
                                ?>
                              </td>
                              <td>
                                <button type="button"  data-toggle="modal" data-target="#detailsModal_<?php echo $visitor->id; ?>" class="btn btn-inverse-warning btn-fw">Details</button>
                                <button type="button"  data-toggle="modal" data-target="#LogUpdateModal_<?php echo $visitor->id; ?>" class="btn btn-inverse-warning btn-fw">Update Log</button>
                                <div class="modal fade" id="LogUpdateModal_<?php echo $visitor->id; ?>" tabindex="-1" role="dialog" aria-labelledby="LogUpdateModal_<?php echo $visitor->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="LogUpdateModal_<?php echo $visitor->id; ?>">Update Time Log</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                              <div class="card-body">
                                                <ul class="list-star">
                                                  <li>Name: <?php echo $visitor->name; ?></li>
                                                  <li>Phone: <?php echo $visitor->phone; ?></li>
                                                  <li>Address: <?php echo $visitor->address; ?></li>
                                                  <li>In Time: <?php echo $visitor->log_in_time; ?></li>
                                                </ul>
                                                <form action="#" class="form-horizontal" role="form" enctype="multipart/form-data" method="post"> 
                                                  @csrf
                                                  <div class="dropdown-divider"></div>
                                                  <div class="row">
                                                      <div class="form-group col-lg-12">
                                                          <input type="hidden" name="log_id_<?php echo $visitor->id; ?>" value="<?php echo $visitor->id; ?>" id="log_id_<?php echo $visitor->id; ?>">
                                                          <label for="out_time_<?php echo $visitor->id; ?>">Out Time</label>
                                                              <input type="text" id="out_time_<?php echo $visitor->id; ?>" class="time-picker form-control" name="3" value="<?php echo $visitor->log_out_time; ?>" readonly>
                                                            <script>
                                                              $('#out_time_<?php echo $visitor->id; ?>').hunterTimePicker({
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
                                          <button type="button" onclick="UpdateLogInfo(<?php echo $visitor->id; ?>)" class="btn btn-primary">Update</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                
                                <div class="modal fade" id="detailsModal_<?php echo $visitor->id; ?>"
                                  tabindex="-1" role="dialog"
                                  aria-labelledby="detailsModal_<?php echo $visitor->id; ?>"
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
                                                                    if($visitor->picture){
                                                                    ?>
                                                                        <img src="files/visitor/profile/<?php echo $visitor->picture; ?>" width="68%"  alt="Profile" class="img-rounded user_image_shadow user-img-center">
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
                                                                    if($visitor->fingure_print){
                                                                    ?>
                                                                        <img src="files/visitor/fingureprint/<?php echo $visitor->fingure_print; ?>" width="68%"  alt="FingurePrint" class="img-rounded user_image_shadow user-img-center">
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
                                                              <h5><?php echo $visitor->name; ?></h5>
                                                              <small>
                                                                <cite title="<?php echo $visitor->name; ?>">
                                                                  <?php echo $visitor->profession; ?>, 
                                                                  <?php echo $visitor->designation; ?>
                                                                      <i class="icon-map-marker"></i>
                                                                </cite>
                                                              </small>
                                                          </blockquote>
                                                          <table>
                                                              <tr>
                                                                <td>Email:</td>
                                                                <td><?php echo $visitor->email; ?> </td>
                                                              </tr>
                                                              <tr>
                                                                <td>Phone:</td>
                                                                <td><?php echo $visitor->phone; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Address:</td>
                                                                <td><?php echo $visitor->address; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Driver Name:</td>
                                                                <td><?php echo $visitor->driver_name; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Driver No:</td>
                                                                <td><?php echo $visitor->driver_phone_no; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Vehicle No:</td>
                                                                <td><?php echo $visitor->vehicle_no; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>From:</td>
                                                                <td><?php echo $visitor->visit_from; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>To:</td>
                                                                <td><?php echo $visitor->visit_to; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Purpose:</td>
                                                                <td><?php echo $visitor->purpose; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Date:</td>
                                                                <td><?php echo $visitor->log_date; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td>In Time:</td>
                                                                <td>
                                                                  <?php
                                                                    if($visitor->log_in_time){
                                                                      echo date('h:i:s a', strtotime($visitor->log_in_time));
                                                                    }
                                                                    ?>
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td>Out Time:</td>
                                                                <td>
                                                                  <?php
                                                                    if($visitor->log_out_time){
                                                                      echo date('h:i:s a', strtotime($visitor->log_out_time));
                                                                    }
                                                                  ?>
                                                                </td>
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
                              
                              </td>
                            </tr>
                          <?php
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
      
      th, td {
        padding: 6px;
        text-align: left;
        font-weight: 300;
        font-size: 14px;
        border: 1px solid #ddd;
      }
      
      tr:hover {background-color: #d6d5d3;}
      tr:nth-child(even) {background-color: #f2f2f2;}

      .custom-modal-size{
        width: 700px !important;
      }
      .custom-dialog-position{
        left: -100px !important;
      }

      /** Clock */
      *,
      *:before,
      *:after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }
      :focus { outline: none }
      ::-moz-focus-inner { border: 0 }
      div.table {
        position: relative;
        display: table;
      }
      .center { text-align: center }
      .right { position:absolute; right: 5px }
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
      i.icon, a.icon {
        background: url("https://cdn.rawgit.com/jonataswalker/timepicker.js/master/examples/clock.png") no-repeat center center;
      }
      .user_image_shadow{
        box-shadow: 0px 2px 4px -1px rgba(0,0,0,0.2), 0px 4px 5px 0px rgba(0,0,0,0.14), 0px 1px 10px 0px rgba(0,0,0,0.12);
      }
      .user-img-center{
        display:block;
        margin:auto;
      }
    </style>
    <script>
        function UpdateLogInfo(Log_id){
          var time = $("#out_time_" + Log_id).val();
          var log_id = $("#log_id_" + Log_id).val();
          console.log(time + log_id);
          axios.post('/update-log', {
            log_id: log_id,
            time: time,
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
      $("#visitor_log").addClass("active");
    </script>
</div> 
@endsection
