<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Med;
use App\Models\Prescription;
use App\Models\Category;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();  // Get the total number of users
        $medicineCount = Med::count();  // Get the total number of medicines
        $categoryCount = Category::count();  // Get the total number of medicines
        $completedPrescriptions = Prescription::where('status', 'completed')->count();  // Get the count of completed prescriptions
        $cancelledPrescriptions = Prescription::where('status', 'cancelled')->count();  // Get the count of completed prescriptions
        $sentPrescriptions = Prescription::where('status', 'sent')->count();  // Get the count of completed prescriptions


        return view('dashWelcome', [
            'userCount' => $userCount,
            'medicineCount' => $medicineCount,
            'completedPrescriptions' => $completedPrescriptions,
            'cancelledPrescriptions' => $cancelledPrescriptions,
            'sentPrescriptions' => $sentPrescriptions,
            'categoryCount' => $categoryCount
        ]);
    }
}
