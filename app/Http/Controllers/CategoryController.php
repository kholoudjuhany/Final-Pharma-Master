<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        $cats = Category::all(); 
        return view('dashboard.categories', ['cats' => $cats]);
    }

    


    public function create()
    {
        return view('dashboard.create_category');
    }

    



    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_description' => 'required|string|max:255',
        ]);
        
        Category::create($request->all());
        
        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }




    public function edit($id)
    {
        $cat = Category::find($id);
        return view('dashboard.edit_category', compact('cat'));
    }

    



    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_description' => 'required|string|max:255',
        ]);
        
        $cat = Category::find($id);
        
        if ($cat) {
            $cat->cat_name = $request->cat_name;
            $cat->cat_description = $request->cat_description;
            
            $cat->save();
            
            return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }

   


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
