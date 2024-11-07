@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container">
            <h1 class="text-center">Your Cart</h1>
            @if(count($cartItems) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Medicine</th>
                        <th scope="col">Original Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Discounted Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            ${{ isset($item['original_price']) ? number_format($item['original_price'], 2) : number_format($item['price'], 2) }}
                        </td>
                        <td>
                            {{ isset($item['discount']) ? ($item['discount'] * 100) . '%' : '0%' }}
                        </td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right"><strong>Total:</strong></td>
                        <td><strong>${{ number_format($totalPrice, 2) }}</strong></td>
                    </tr>
                </tfoot>
            </table>
            
            <!-- Proceed to checkout or empty the cart -->
            <div class="text-center mt-4">
                <a href="{{ route('medicines.storePage', ['user_id' => session('active_user_id')]) }}" class="btn btn-primary">Back to Store</a>
                <form method="POST" action="{{ route('premeds.store') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Save The Prescription</button>
                </form>
                <form method="POST" action="{{ route('cart.clear') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Clear Cart</button>
                </form>
            </div>
            @else
            <p class="text-center">Your cart is empty.</p>
            @endif
        </div>
    </div>
</div>
@endsection




