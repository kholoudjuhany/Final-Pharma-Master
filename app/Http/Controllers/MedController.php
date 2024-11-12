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

        // Retrieve the search input from the request
        $search = $request->input('search');
        $categoryId = $request->input('cat_id'); // Get the selected category

        // Retrieve medicines, filter by search term and category if provided
        $medicines = Med::query();

        // Apply search filter if there is a search term
        if ($search) {
            $medicines->where('med_name', 'like', '%' . $search . '%');
        }

        // Apply category filter if a category is selected (not empty)
        if ($categoryId) {
            $medicines->where('cat_id', $categoryId);
        }

        // Order medicines: prioritize lower quantities first
        $medicines = $medicines->orderByRaw('med_quantity < 150 DESC, med_quantity ASC')->get();

        // Retrieve all categories
        $categories = Category::all();

        // Check if the request is AJAX and return only the medicine list as HTML
        if ($request->ajax()) {
            return response()->json([
                'medicines' => view('dashboard.medicines_partial', compact('medicines'))->render(),
            ]);
        }

        // Pass both medicines and categories to the view
        return view('dashboard.medicines_store', compact('medicines', 'categories', 'categoryId'));
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
