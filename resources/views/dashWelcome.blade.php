@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <!-- Section above the cards -->
            <div class="mb-4 text-center">
                <h2 class="mb-3">Dashboard Overview</h2>
                <p class="lead">A quick overview of the current statistics.</p>
            </div>

            <div class="row justify-content-center">
                <!-- Total Users -->
                <div class="col-md-4 col-xl-3 mb-4">
                    <div class="card h-100 text-white bg-primary shadow-sm" style="min-height: 180px;">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-users"></i> Total Users</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text">{{ $userCount }} User</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="col-md-4 col-xl-3 mb-4">
                    <div class="card h-100 text-white" style="background-color: #b42498; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); min-height: 180px;">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-th-large"></i> Total Categories</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text">{{ $categoryCount }} Categories</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Medicines -->
                <div class="col-md-4 col-xl-3 mb-4">
                    <div class="card h-100 text-white shadow-sm" style="background-color: #2aebdb; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); min-height: 180px;">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-capsules"></i> Total Medicines</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text">{{ $medicineCount }} Medicine</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Total Completed Prescriptions -->
                <div class="col-md-4 col-xl-3 mb-4">
                    <div class="card h-100 text-white bg-success shadow-sm" style="min-height: 180px;">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-check-circle"></i> Completed Prescriptions</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text">{{ $completedPrescriptions }} Prescription</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Sent Prescriptions -->
                <div class="col-md-4 col-xl-3 mb-4">
                    <div class="card h-100 text-white bg-warning shadow-sm" style="min-height: 180px;">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-paper-plane"></i> Sent Prescriptions</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text">{{ $sentPrescriptions }} Prescription</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Cancelled Prescriptions -->
                <div class="col-md-4 col-xl-3 mb-4">
                    <div class="card h-100 text-white bg-danger shadow-sm" style="min-height: 180px;">
                        <div class="card-header">
                            <h5 class="card-title"><i class="fas fa-times-circle"></i> Cancelled Prescriptions</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="card-text">{{ $cancelledPrescriptions }} Prescription</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





