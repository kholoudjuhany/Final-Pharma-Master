@extends('layouts.app')

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-5 text-black">Welcome to the Main Page</h2>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Check if a prescription exists and its status -->
        @if(isset($prescription) && $prescription->status !== 'cancelled')
            @if($prescription->status === 'completed')
                <p class="mb-4">Thank You! Your Order is on the way.</p>
            @elseif($prescription->status === 'sent')
                <p class="mb-4">Your prescription has been sent! Complete your Order.</p>
                <a href="{{ route('prescriptions.bill', $prescription->id) }}" class="btn btn-primary">View Bill</a>
            @elseif($prescription->status === 'pending')
                <p class="mb-4">Your prescription request is sent! Please wait 10-20 minutes for processing.</p>
            @else
                <p class="mb-4">Your prescription status is: {{ $prescription->status }}.</p>
            @endif
        @else
            <!-- Clear session if prescription is cancelled to allow new submission -->
            @if(isset($prescription) && $prescription->status === 'cancelled')
                {{ session()->forget('active_prescription') }}
            @endif

            <!-- Show form to submit a new prescription -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4">Please add your prescription</h3>
                    <form action="{{ route('prescriptions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pre_details">Choose a photo to upload:</label>
                            <input type="file" class="form-control" id="pre_details" name="pre_details" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Photo</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection







