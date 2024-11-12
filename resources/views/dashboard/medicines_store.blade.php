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

            <!-- Search Bar and Category Filter -->
            <div class="row mb-4">
                <form id="searchForm" method="GET" action="{{ route('medicines.storePage') }}" class="w-100">
                    <div class="form-group d-flex">
                        <!-- Search Bar -->
                        <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search Medicines"
                               value="{{ request('search') }}" style="width: 60%; margin-right: 10px;">
                        
                        <!-- Category Filter -->
                        <select name="cat_id" id="categoryFilter" class="form-control" style="width: 35%;">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->cat_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            
            <!-- Display medicines in cards -->
            <div id="medicinesList" class="row">
                @foreach($medicines as $medicine)
                <div class="col-md-4 mb-4">
                    <div class="card" 
                        style="{{ $medicine->med_quantity < 150 ? 'box-shadow: 0px 4px 12px rgba(255, 0, 0, 0.5);' : '' }}">
                        <img src="{{ asset('storage/' . $medicine->med_img) }}" class="card-img-top" alt="{{ $medicine->med_name }}" style="height: 480px; object-fit: cover;">
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

<!-- AJAX Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Event listener for search input change
        $('#searchInput').on('keyup', function() {
            var searchValue = $(this).val();
            var categoryId = $('#categoryFilter').val();

            // Perform the AJAX request
            $.ajax({
                url: '{{ route('medicines.storePage') }}',
                method: 'GET',
                data: {
                    search: searchValue,
                    cat_id: categoryId
                },
                success: function(response) {
                    $('#medicinesList').html(response.medicines); // Update the medicine list
                }
            });
        });

        // Event listener for category filter change
        $('#categoryFilter').on('change', function() {
            var searchValue = $('#searchInput').val();
            var categoryId = $(this).val();

            // Perform the AJAX request
            $.ajax({
                url: '{{ route('medicines.storePage') }}',
                method: 'GET',
                data: {
                    search: searchValue,
                    cat_id: categoryId
                },
                success: function(response) {
                    $('#medicinesList').html(response.medicines); // Update the medicine list
                }
            });
        });
    });
</script>
@endsection







