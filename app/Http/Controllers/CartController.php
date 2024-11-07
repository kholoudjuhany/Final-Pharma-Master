<?php

namespace App\Http\Controllers;

use App\Models\Med;
use App\Models\User;
use App\Models\HIC;
use App\Models\Prescription;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show the cart page
    public function showCart()
    {
        $cartItems = session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cartItems as $id => $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('dashboard.cart', compact('cartItems', 'totalPrice'));
    }

    // Add a medicine to the cart
    public function addToCart(Request $request, $id)
    {
        $medicine = Med::findOrFail($id);
        $cart = session()->get('cart', []);
    
        // Retrieve the user_id from the session or fallback to activePrescription's user_id
        $userId = session()->get('active_user_id', function() {
            $activePrescription = session()->get('activePrescription');
            return Prescription::find($activePrescription)->user_id ?? null;
        });
    
        if ($userId) {
            session()->put('active_user_id', $userId); // Ensure user_id is saved in session
        } else {
            return redirect()->back()->with('error', 'User ID is missing.');
        }
    
        $user = User::find($userId); // Fetch user based on active user ID
    
        // Check if the user has a health insurance company
        $insuranceCompany = $user->hic;
        
        // Calculate price after applying the discount
        $price = $medicine->med_price;
        $discount = 0; // Default no discount
        
        if ($insuranceCompany) {
            $discount = $insuranceCompany->HIC_disscount; // E.g., 10% discount
            $price -= ($price * ($discount)); // Apply the discount
        }
    
        // Store the discount and original price in the session
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $medicine->med_name,
                'original_price' => $medicine->med_price,
                'discount' => $discount,
                'price' => $price,
                'quantity' => 1,
            ];
        }
    
        // Save the updated cart to the session
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Medicine added to cart!');
    }

    // Remove a specific medicine from the cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Medicine removed from cart!');
    }

    // Clear the entire cart
    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Cart cleared!');
    }

    // Checkout (placeholder, you can extend with actual payment/processing logic)
    public function checkout()
    {
        // For now, just clear the cart and show a message
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Checkout complete!');
    }

    public function switchRequest($newRequestId)
    {
        session()->forget('cart');          // Clears the cart items
        session()->forget('discount');      // Clears any discount information
        session()->forget('appliedDiscount'); // If you store the applied discount separately

        // Fetch the new request (assuming the model is 'Prescription')
        $newRequest = Prescription::findOrFail($newRequestId);

        // Optionally, set the user or prescription in the session if needed
        session()->put('activePrescription', $newRequest->id);
    
        // Redirect to the medicine store or cart page to start a new session
        return redirect()->route('medicines.storePage', ['user_id' => $newRequest->user_id]);
    }
}

