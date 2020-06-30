<?php

namespace App\Http\Controllers;

use App\Models\Causes;
use App\Models\Donation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CausesController extends Controller
{
    public function index()
    {
        $causes = Causes::paginate(20);

        return view('causes.index', compact('causes'));
    }

    public function show(string $slug)
    {
        $cause = Causes::where('slug', $slug)->firstOrFail();

        return view('causes.show', compact('cause'));
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $cents = bcmul($request->amount, 100);

        $paymentInfo = [
            'amount' => $cents,
            'currency'  => 'usd',
        ];

        $intent = PaymentIntent::create($paymentInfo);

        $confirm = $intent->confirm([
           'payment_method' => 'pm_card_visa',
        ]);

        if ($confirm->status === 'succeeded') {

            Donation::create([
                'causes_id' => $request->cause_id,
                'amount' => $cents,
                'donated_by'    => auth()->user()->id,
                'status' => 'approved',
                'type' => 'money'
            ]);

            Alert::success('Donation success', 'Your donation recevied successfully');

            return redirect('/')->with(['success' => 'Your donation received successfully']);
        }

        Alert::error('Donation failed', 'Sorry something went wrong, Please try latter');

        return redirect()->back()->with(['error' => 'Something wrong in payment']);
    }
}
