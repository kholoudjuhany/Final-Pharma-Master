@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container">
            <h1 class="text-center">Medicines Store</h1>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            
            <!-- Button to view the cart -->
            <div class="text-right mb-4">
                <a href="{{ route('cart.show') }}" class="btn btn-info">View Cart</a>
            </div>

            <!-- Display categories as buttons or a dropdown -->
            <div class="row mb-4">
                <form method="GET" action="{{ route('medicines.storePage') }}">
                    <div class="form-group">
                        <select name="category_id" class="form-control" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->cat_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            
            <!-- Display medicines in cards -->
            <div class="row">
                @foreach($medicines as $medicine)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $medicine->med_img) }}" class="card-img-top" alt="{{ $medicine->med_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $medicine->med_name }}</h5>
                            <p class="card-text">Price: ${{ $medicine->med_price }}</p>
                            <p class="card-text">Quantity: {{ $medicine->med_quantity }}</p>
                            <form method="POST" action="{{ route('cart.add', $medicine->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

