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
