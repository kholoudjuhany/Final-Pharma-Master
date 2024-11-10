<?php

namespace App\Http\Controllers;

use App\Models\Med;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class MedController extends Controller
{

    public function displayMeds()
    {
        // Get the first 5 medicines
        $medicines = Med::take(5)->get();

        // Return the landing page view with the medicines data
        return view('welcome', compact('medicines'));
    }

    public function storePage(Request $request)
    {
        $userId = $request->input('user_id');
        session()->put('active_user_id', $userId);

        // Retrieve all medicines and categories
        $medicines = Med::all();
        $categories = Category::all(); // Make sure to replace 'Category' with your actual model name for categories

        // Pass both medicines and categories to the view
        return view('dashboard.medicines_store', compact('medicines', 'categories'));
    }



    public function index()
    {
        $meds = Med::all(); 
        return view('dashboard.meds', ['meds' => $meds]); 
    }

   




    public function create()
    {
        $cats = Category::all();
        return view('dashboard.create_med', compact('cats'));
    }




    public function show($id, Request $request)
    {
        $categories = Category::all(); // Fetch all categories

        // If a category is selected, filter medicines, else fetch all
        $query = Med::query();

        if ($request->has('category_id')) {
            $query->where('cat_id', $request->category_id);
        }

        $medicines = $query->get();

        return view('dashboard.medicines_store', compact('medicines', 'categories'));
    }


    



    public function store(Request $request)
    {
        $request->validate([
            'med_name' => 'required|string|max:255',
            'med_quantity' => 'required|numeric',
            'med_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'med_price' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
        ]);
    
        // Handle image upload
        if ($request->hasFile('med_img')) {
            // Store the image in 'public/assets/dashboard/images/img'
            $imagePath = $request->file('med_img')->store('assets/dashboard/images/img', 'public');
        }
    
        $med = new Med();
        $med->med_name = $request->med_name;
        $med->med_quantity = $request->med_quantity;
        $med->med_img = $imagePath; // Store the relative image path
        $med->med_price = $request->med_price;
        $med->cat_id = $request->cat_id;
        $med->save();
    
        return redirect()->route('medicines.index')->with('success', 'Medicine created successfully.');
    }

    





    public function edit($id)
    {
        $med = Med::find($id); // Fetch the medicine by ID
        $cats = Category::all(); // Assuming you are fetching categories for the dropdown
        if (!$med) {
            return redirect()->back()->with('error', 'Medicine not found.');
        }
        return view('dashboard.edit_med', compact('med', 'cats'));
    }


    






    public function update(Request $request, $id)
    {
        $request->validate([
            'med_name' => 'required|string|max:255',
            'med_quantity' => 'required|numeric',
            'med_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is optional
            'med_price' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
        ]);
    
        // Find the medicine by ID
        $med = Med::find($id);
    
        if ($med) {
            $med->med_name = $request->med_name;
            $med->med_quantity = $request->med_quantity;
            $med->med_price = $request->med_price;
            $med->cat_id = $request->cat_id;
    
            // Check if a new image has been uploaded
            if ($request->hasFile('med_img')) {
                $imagePath = $request->file('med_img')->store('assets/dashboard/images/img', 'public');
                $med->med_img = $imagePath; // Update the image path
            }
    
            $med->save();
    
            return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Medicine not found.');
        }
    }

   






    public function destroy($id)
    {
        $med = Med::findOrFail($id); 
        $med->delete(); 
    
        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}
