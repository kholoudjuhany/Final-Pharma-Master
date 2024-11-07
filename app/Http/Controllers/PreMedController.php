<?php

namespace App\Http\Controllers;

use App\Models\preMed;
use App\Models\Prescription;
use App\Models\Med;
use App\Models\User;
use Illuminate\Http\Request;

class PreMedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Retrieve the active user ID from the session
    $userId = session()->get('active_user_id');
    $user = User::with('hic')->find($userId); // Load the user with HIC relationship

    // Check if the user has a health insurance company
    $discount = $user->hic ? $user->hic->HIC_disscount : 0; // E.g., 10% discount

    // Retrieve all premed records, including related prescription and medicine details
    $premeds = PreMed::with(['prescription.user', 'med']) // Include user and prescription relationships
        ->get()
        ->groupBy('pre_id'); // Group by prescription ID

    // Calculate total prices and organize medicines by prescription
    $data = $premeds->map(function ($items, $pre_id) use ($discount) {
        $firstItem = $items->first();
        
        return [
            'pre_id' => $pre_id,
            'medicines' => $items->pluck('med.med_name')->join(', '), // Access 'med' relationship for med_name
            'total_price' => $items->sum(function ($item) use ($discount) {
                // Calculate the discounted price
                $priceAfterDiscount = $item->med->med_price * (1 - $discount); // Apply the discount
                return $priceAfterDiscount * $item->quantity; // Multiply by quantity
            }),
            'status' => $firstItem->prescription->status, // Prescription status
            'user_name' => $firstItem->prescription->user->Fname . ' ' . $firstItem->prescription->user->Lname // Full name
        ];
    });
    
    return view('dashboard.premed', compact('data'));
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
        // Retrieve cart items and active prescription ID from session
        $cartItems = session()->get('cart', []);
        $activePrescriptionId = session()->get('activePrescription');

        // Ensure there's an active prescription and cart items to save
        if (!$activePrescriptionId || empty($cartItems)) {
            return redirect()->route('cart.show')->with('error', 'No active prescription or cart items to save.');
        }

        // Save each item in the cart to the PreMed table
        foreach ($cartItems as $id => $item) {
            preMed::create([
                'quantity' => $item['quantity'],
                'notes' => $item['name'],  // Customize as needed based on your data structure
                'pre_id' => $activePrescriptionId,
                'med_id' => $id,
            ]);
        }

        // Clear the cart after saving
        session()->forget('cart');

        // Redirect to the premed success page
        return redirect()->route('premeds.index')->with('success', 'Prescription saved successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(preMed $preMed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(preMed $preMed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, preMed $preMed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $premed = preMed::findOrFail($id); 
        $preMed->delete(); 
    
        return redirect()->route('premeds.index')->with('success', 'PreMed deleted successfully.');
    }
}
