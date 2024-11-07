<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    public function showBill($id)
{
    // Retrieve the prescription with related user, user's HIC, and premeds
    $prescription = Prescription::with('premeds.med', 'user.hic')->findOrFail($id);

    // Calculate the total price based on the medications and their quantities
    $totalPrice = $prescription->premeds->sum(function($premed) {
        return $premed->med->med_price * $premed->quantity;
    });

    // Retrieve the discount from the HIC associated with the user
    $userDiscount = $prescription->user->hic->HIC_disscount ?? 0; // Default to 0 if no discount is set

    // Apply the discount to the total price
    $discountedPrice = $totalPrice * (1 - $userDiscount);

    // Return the view with prescription, total price, and discounted price
    return view('landing.pages.bill', compact('prescription', 'totalPrice', 'discountedPrice'));
}





    public function requests()
    {
        // Fetch all pending prescriptions with the related user
        $pendingPrescriptions = Prescription::with('user') // Assuming you have a relationship with User model
        ->where('status', 'pending')
        ->get();
        
        return view('dashboard.requests', compact('pendingPrescriptions'));
    }

    // for notifications in the sidebar
    public function getPendingCount()
    {
        return Prescription::where('status', 'pending')->count();
    }
    

    public function index()
    {
        $prescriptions = Prescription::all(); 
        return view('dashboard.prescriptions', ['prescriptions' => $prescriptions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    






    public function store(Request $request)
    {
        $request->validate([
            'pre_details' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Handle image upload
        $imagePath = $request->file('pre_details')->store('assets/dashboard/images/img', 'public');
    
        // Create a new prescription
        $prescription = new Prescription();
        $prescription->status = 'pending';
        $prescription->pre_details = $imagePath; 
        $prescription->user_id = auth()->id();
        $prescription->save(); 
    
        return redirect()->route('main'); // Change to the route for your main page
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        //
    }

    


    public function edit($id)
    {
        $prescription = Prescription::find($id); // Fetch the medicine by ID
        if (!$prescription) {
            return redirect()->back()->with('error', 'Prescription not found.');
        }
        return view('dashboard.edit_prescription', compact('prescription'));
    }

    


    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
            'bill' => 'nullable|string|required_if:status,completed',
        ]);
    
        // Find the prescription by ID
        $prescription = Prescription::find($id);
    
        if ($prescription) {
            // Update the status
            $prescription->status = $request->status;
    
            // If the status is 'completed', update the bill
            if ($request->status === 'completed') {
                $prescription->bill = $request->bill;  // Assign bill content
            }
    
            // Save changes
            $prescription->save();
    
            // Check if the status is 'cancelled', redirect user to main page
            if ($request->status === 'cancelled') {
                return redirect()->route('prescriptions.index');
            }
    
            return redirect()->route('prescriptions.index');
        } else {
            return redirect()->back()->with('error', 'Prescription not found.');
        }
    
    }

    

    public function destroy($id)
    {
        $prescription = Prescription::findOrFail($id); 
        $prescription->delete(); 
    
        return redirect()->route('prescriptions.index');
    }
}

