<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminDonorController extends Controller
{
    public function index()
    {
        $donors = User::where('role', 'donator')->paginate(20);

        return view('admin.donors.index', compact('donors'));
    }


    public function destroy(User $donor)
    {
        $donor->delete();

        return redirect()->back()->with(['success' => 'Donor deleted successfully!']);
    }
}
