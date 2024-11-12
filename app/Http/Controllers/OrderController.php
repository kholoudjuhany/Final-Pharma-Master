<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Prescription;
use Illuminate\Http\Request;


class OrderController extends Controller
{

    public function sendToCustomer($pre_id)
    {
        // Retrieve the prescription
        $prescription = Prescription::findOrFail($pre_id);

        // Update the prescription status to 'sent'
        $prescription->status = 'sent';
        $prescription->save();

        // Store prescription info in session or database if necessary
        session()->put('active_prescription', $prescription);

        // Redirect back to the main page with a success message
        return redirect()->route('dashboard')->with('success', 'Prescription sent to the customer!');
    }

    

    public function completeOrder(Request $request)
{
    $prescription = session('active_prescription');  // Get the prescription from session

    if ($prescription) {
        // Calculate the total price with discount
        $totalPrice = 0;
        foreach ($prescription->premeds as $premed) {
            $totalPrice += $premed->med->med_price * $premed->quantity;

            // Decrease the quantity of each medicine in the meds table
            $med = $premed->med;
            $med->med_quantity -= $premed->quantity;

            // Ensure quantity does not go below zero
            if ($med->med_quantity < 0) {
                $med->med_quantity = 0;
            }

            // Save the updated quantity to the database
            $med->save();
        }

        // Apply discount if applicable
        $discount = $prescription->user->hic->HIC_disscount ?? 0;
        $discountedPrice = $totalPrice * (1 - $discount);

        // Store the order with the discounted price
        Order::create([
            'order_total_price' => $discountedPrice,
            'order_date' => now(),
            'pre_id' => $prescription->id,
            'user_id' => auth()->id(),
        ]);

        // Update the prescription status to 'completed'
        $prescription->update(['status' => 'completed']);

        // Clear session data for the active prescription
        session()->forget('active_prescription');

        // Redirect to the main page with success message
        return redirect()->route('main');
    }

    return redirect()->route('main')->with('error', 'Failed to complete the order.');
}









    public function cancelOrder(Request $request)
    {
        $prescription = session('active_prescription');

        if ($prescription) {
            // Update the prescription status to 'cancelled'
            $prescription->status = 'cancelled';
            $prescription->save();
        }

        return redirect()->route('main');
    }


    
    public function index()
    {
        $orders = Order::with(['prescription', 'user'])->get(); // Include related data
        return view('dashboard.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $prescription = session('active_prescription');

    if ($prescription) {
        // Calculate the total price
        $totalPrice = 0;
        foreach ($prescription->premeds as $premed) {
            $totalPrice += $premed->med->med_price * $premed->quantity;
        }

        // Apply discount if applicable
        $discount = $prescription->user->hic->HIC_disscount ?? 0;
        $discountedPrice = $totalPrice * (1 - $discount);

        // Create the order in the orders table
        Order::create([
            'order_total_price' => $discountedPrice,  // Use the discounted price here
            'order_date' => now(),
            'pre_id' => $prescription->id,
            'user_id' => auth()->id(),
        ]);

        // Clear the session data for the active prescription
        session()->forget('active_prescription');
    }
}
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
