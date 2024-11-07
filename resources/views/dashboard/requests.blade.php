@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container">
            <h2>Customer Requests</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Prescription Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingPrescriptions as $prescription)
                    <tr>
                        <td>{{ $prescription->user ? $prescription->user->Fname . ' ' . $prescription->user->Lname : 'No Users'}}</td>
                        <td>
                            @if ($prescription->pre_details)
                            <a href="{{ asset('storage/' . $prescription->pre_details) }}" target="_blank">
                                <img src="{{ asset('storage/' . $prescription->pre_details) }}" alt="Prescription" width="150" height="150" />
                            </a>
                            @else
                            <p>No Image Available</p>
                            @endif
                        </td>
                        <td>
                            <!-- Form to trigger the switchRequest method -->
                            <form action="{{ route('switchRequest', ['newRequestId' => $prescription->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-2">Go to Med Store</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection





