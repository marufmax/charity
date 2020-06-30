<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Causes;
use App\Models\Donation;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalDonation = Donation::count('id');
        $totalDonators = User::where('role', 'donator')->count();

        $totalCauses = Causes::count('id');
        $pendingDonation = Donation::where('status', 'pending')->count();

        $thisMonthDonationTotal = Donation::where('type', 'money')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())->sum('amount');

        $thisMonthDonations = Donation::where('type', 'money')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())->take(10)->with(['cause', 'donor'])->get();


        return view('admin.dashboard.index', compact(
            'totalCauses',
            'totalDonation',
            'totalDonators',
            'pendingDonation',
            'thisMonthDonationTotal',
            'thisMonthDonations'
        ));
    }
}
