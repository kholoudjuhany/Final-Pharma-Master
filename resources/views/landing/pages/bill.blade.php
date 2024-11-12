@extends('layouts.app')

@section('content')
<div class="site-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Your Bill</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <p><strong>Prescription ID:</strong> <span class="text-muted">{{ $prescription->id }}</span></p>
                            <p><strong>Total Price Before Discount:</strong> <span class="text-muted">${{ number_format($totalPrice, 2) }}</span></p>
                            <p><strong>Discount Applied:</strong> <span class="text-muted">{{ isset($prescription->user->hic->HIC_disscount) ? ($prescription->user->hic->HIC_disscount * 100) . '%' : '0%' }}</span></p>
                            <p><strong>Total Price After Discount:</strong> <span class="text-muted">${{ number_format($discountedPrice, 2) }}</span></p>
                        </div>

                        <h3 class="mb-4">Medications:</h3>
                        <ul class="list-group mb-4">
                            @foreach($prescription->premeds as $premed)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ $premed->med->med_name }} (Quantity: {{ $premed->quantity }})</span>
                                    <span>${{ number_format($premed->med->med_price * $premed->quantity, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="d-flex justify-content-between">
                            <form action="{{ route('orders.complete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="prescription_id" value="{{ $prescription->id }}">
                                <button type="submit" class="btn btn-success btn-lg">Complete</button>
                            </form>

                            <form action="{{ route('orders.cancel') }}" method="POST">
                                @csrf
                                <input type="hidden" name="prescription_id" value="{{ $prescription->id }}">
                                <button type="submit" class="btn btn-danger btn-lg">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

