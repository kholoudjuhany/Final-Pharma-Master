<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HIC;
use App\Models\Prescription;

class UserController extends Controller
{

    public function showMainPage()
    {
        /// Try to get the active prescription from the session
        $prescription = session('active_prescription');

        // If no active prescription is found in the session, fetch the latest one from the database
        if (!$prescription) {
            $prescription = Prescription::where('user_id', auth()->id())
            ->latest()
            ->first();
        }

        // Pass the prescription (if any) to the view
        return view('landing.pages.main', compact('prescription'));
    }
    
    public function index()
{
    $users = User::all(); 
    return view('dashboard.users', ['users' => $users]);
}


    




    public function create()
    {
        // return view('');
    }



    




    public function store(Request $request)
    {
        $request->validate([
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'DoB' => 'required|date',
            'gender' => 'required|in:Female,Male',
            'personal_id' => 'required|string|unique:users,personal_id|max:10',
            'email' => 'required|email|unique:users,email',
            'user_mobile' => 'required|string|max:13',
            'password' => 'required|string|min:8|confirmed',
            'user_role' => 'required|in:customer,doctor',
            'address' => 'required|string|max:255',
            'HIC_id' => 'required|exists:h_i_c_s,id', 
        ]);
        
        $user = new User();
        $user->Fname = $request->Fname;
        $user->Lname = $request->Lname;
        $user->DoB = $request->DoB;
        $user->gender = $request->gender;
        $user->personal_id = $request->personal_id;
        $user->email = $request->email;
        $user->user_mobile = $request->user_mobile;
        $user->password = Hash::make($request->password); 
        $user->user_role = $request->user_role;
        $user->address = $request->address;
        $user->HIC_id = $request->HIC_id;
        $user->save();
        
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    






    
    public function edit(User $user)
    {
        $hics = HIC::all();
        return view('dashboard.edit_user', compact('user', 'hics'));
    }

    







    public function update(Request $request, $id)
    {
        $request->validate([
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'DoB' => 'required|date',
            'gender' => 'required|string',
            'personal_id' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'user_mobile' => 'required|string|max:13',
            'address' => 'required|string|max:255',
            'HIC_id' => 'required|integer',
            'user_role' => 'required|string',
        ]);
        
        $user = User::find($id);
        
        if ($user) {
            $user->Fname = $request->Fname;
            $user->Lname = $request->Lname;
            $user->DoB = $request->DoB;
            $user->gender = $request->gender;
            $user->personal_id = $request->personal_id;
            $user->email = $request->email;
            $user->user_mobile = $request->user_mobile;
            $user->address = $request->address;
            $user->HIC_id = $request->HIC_id;
            $user->user_role = $request->user_role;
            $user->save();
            
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }







  
    public function destroy($id)
    {
        $user = User::findOrFail($id); 
        $user->delete(); 
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    

}