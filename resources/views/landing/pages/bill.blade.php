@extends('layouts.app')

@section('content')
<div class="site-section">
    <div class="container">
        <h2>Your Bill</h2>
        <p>Prescription ID: <strong>{{ $prescription->id }}</strong></p>
        <p>Total Price Before Discount: <strong>${{ number_format($totalPrice, 2) }}</strong></p>
        <p>Discount Applied: <strong>{{ isset($prescription->user->hic->HIC_disscount) ? ($prescription->user->hic->HIC_disscount * 100) . '%' : '0%' }}</strong></p>
        <p>Total Price After Discount: <strong>${{ number_format($discountedPrice, 2) }}</strong></p>

        <h3>Medications:</h3>
        <ul>
            @foreach($prescription->premeds as $premed)
                <li>{{ $premed->med->med_name }} (Quantity: {{ $premed->quantity }})</li>
            @endforeach
        </ul>

        <div class="mt-3">
            <form action="{{ route('orders.complete') }}" method="POST">
                @csrf
                <input type="hidden" name="prescription_id" value="{{ $prescription->id }}">
                <button type="submit" class="btn btn-success">Complete</button>
            </form>

            <form action="{{ route('orders.cancel') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="prescription_id" value="{{ $prescription->id }}">
                <button type="submit" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection








