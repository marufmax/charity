<?php

namespace App\Http\Controllers\Donors;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Carbon\Carbon;

class DonorDashboardController extends Controller
{
    public function index()
    {
        $totalDonation = Donation::where('donated_by', auth()->user()->id)->count('id');
        $totalDonationAmount = Donation::where('donated_by', auth()->user()->id)->sum('amount');

        $latestDonations = Donation::where('type', 'money')
            ->where('donated_by', auth()->user()->id)
            ->where('created_at', '>=', Carbon::now()->startOfMonth())->take(10)->with(['cause', 'donor'])->get();

        return view('admin.dashboard.donor-index', compact(
            'latestDonations',
            'totalDonation',
            'totalDonationAmount'
        ));
    }
}
