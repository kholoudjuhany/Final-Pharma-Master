<?php

namespace App\Http\Controllers;

use App\Models\HIC;
use Illuminate\Http\Request;

class HICController extends Controller
{
    


    public function index()
    {
        $hics = HIC::all(); 
        return view('dashboard.hics', ['hics' => $hics]);
    }





    public function create()
    {
        return view('dashboard.create_hic');
    }

    



    public function store(Request $request)
    {
        
        $request->validate([
            'HIC_name' => 'required|string|max:255',
            'HIC_disscount' => 'required|numeric',
            'HIC_email' => 'required|email|max:255',
            'HIC_mobile' => 'required|string|max:10',
        ]);
        
        HIC::create($request->all());
        
        return redirect()->route('hics.index')->with('success', 'HIC added successfully.');
    }


    


    public function edit($id)
    {
        $hIC = HIC::find($id);
        return view('dashboard.edit_hic', compact('hIC'));
    }

    




    public function update(Request $request, $id)
    {
        $request->validate([
            'HIC_name' => 'required|string|max:255',
            'HIC_email' => 'required|email|max:255',
            'HIC_mobile' => 'required|string|max:10',
        ]);
        
        $hic = HIC::find($id);
        
        if ($hic) {
            $hic->HIC_name = $request->HIC_name;
            $hic->HIC_email = $request->HIC_email;
            $hic->HIC_mobile = $request->HIC_mobile;
            
            $hic->save();
            
            return redirect()->route('hics.index')->with('success', 'HIC updated successfully.');
        } else {
            return redirect()->back()->with('error', 'HIC not found.');
        }
    }

    


    public function destroy(HIC $hic)
    {
        $hic->delete();
        return redirect()->route('hics.index')->with('success', 'HIC deleted successfully.');
    }
}
