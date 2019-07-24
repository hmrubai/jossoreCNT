{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} </div> @endif You are logged in! </div>
</div>
</div>
</div>
</div> @endsection --}} @extends('layouts.master') @section('content') <div class="content-wrapper">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-cube text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total Visitors</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $visitors }}</h3>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('visitor-list') }}" class="nav-link"><p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Show All Visitors </p></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total Employees</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $employees }}</h3>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('employee-log-list') }}" class="nav-link"><p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Show All Employees </p></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Visitor Log</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $visitors }}</h3>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('visitor-list') }}" class="nav-link"><p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> See All </p></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Employee Log</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $employee_log }}</h3>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('employee-log-list') }}" class="nav-link"> <p class="text-muted mt-3 mb-0"><i class="mdi mdi-reload mr-1" aria-hidden="true"></i> See Logs </p></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body"> Log List </div>
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
        $("#home").addClass("active");
    </script>
</div> @endsection
