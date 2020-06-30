@extends('admin.default')

@section('content')

   <h4> Hi {{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>

   @can('onlyAdmin', auth()->user())
   <div class="row gap-20">
       <div class="col-md-3">
           <div class="layers bd bgc-white p-20">
               <div class="layer w-100 mB-10">
                   <h6 class="lh-1">Total Donations</h6></div>
               <div class="layer w-100">
                   <div class="peers ai-sb fxw-nw">
                       <div class="peer peer-greed"><span id="sparklinedash"><canvas width="45" height="20" style="display: inline-block; width: 45px; height: 20px; vertical-align: top;"></canvas></span></div>
                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{ $totalDonation }}</span></div>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-md-3">
           <div class="layers bd bgc-white p-20">
               <div class="layer w-100 mB-10">
                   <h6 class="lh-1">Pending Donations</h6></div>
               <div class="layer w-100">
                   <div class="peers ai-sb fxw-nw">
                       <div class="peer peer-greed"><span id="sparklinedash4"><canvas width="45" height="20" style="display: inline-block; width: 45px; height: 20px; vertical-align: top;"></canvas></span></div>
                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">{{ $pendingDonation }}</span></div>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-md-3">
           <div class="layers bd bgc-white p-20">
               <div class="layer w-100 mB-10">
                   <h6 class="lh-1">Total Donators</h6></div>
               <div class="layer w-100">
                   <div class="peers ai-sb fxw-nw">
                       <div class="peer peer-greed"><span id="sparklinedash2"><canvas width="45" height="20" style="display: inline-block; width: 45px; height: 20px; vertical-align: top;"></canvas></span></div>
                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{ $totalDonators }}</span></div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-3">
           <div class="layers bd bgc-white p-20">
               <div class="layer w-100 mB-10">
                   <h6 class="lh-1">Total Causes</h6></div>
               <div class="layer w-100">
                   <div class="peers ai-sb fxw-nw">
                       <div class="peer peer-greed"><span id="sparklinedash3"><canvas width="45" height="20" style="display: inline-block; width: 45px; height: 20px; vertical-align: top;"></canvas></span></div>
                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">{{ $totalCauses }}</span></div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="row">
       <div class="masonry-item col-md-12 mt-4">
           <div class="bd bgc-white">
               <div class="layers">
                   <div class="layer w-100 p-20">
                       <h6 class="lh-1">Donation Report</h6></div>
                   <div class="layer w-100">
                       <div class="bgc-light-blue-500 c-white p-20">
                           <div class="peers ai-c jc-sb gap-40">
                               <div class="peer peer-greed">
                                   <h5>{{ date('M') }} {{ date('Y') }}</h5>
                                   <p class="mB-0">Donations this month</p>
                               </div>
                               <div class="peer">
                                   <h3 class="text-right"> USD {{ $thisMonthDonationTotal }}</h3></div>
                           </div>
                       </div>
                       <div class="table-responsive p-20">
                           <table class="table">
                               <thead>
                               <tr>
                                   <th class="bdwT-0">Name</th>
                                   <th class="bdwT-0">Status</th>
                                   <th class="bdwT-0">Donor</th>
                                   <th class="bdwT-0">Date</th>
                                   <th class="bdwT-0">Amount</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($thisMonthDonations as $donation)
                                   <tr>
                                       <td class="fw-600">{{ $donation->cause->title }}</td>
                                       <td>
                                           @if ($donation->status === 'pending')
                                               <span class="badge bgc-deep-purple-50 c-deep-purple-700 p-10 lh-0 tt-c badge-pill">{{ $donation->status }}</span>
                                           @endif

                                           @if ($donation->status === 'rejected')
                                               <span class="badge bgc-deep-red-50 c-deep-red-700 p-10 lh-0 tt-c badge-pill">{{ $donation->status }}</span>
                                           @endif

                                           @if ($donation->status === 'approved')
                                                   <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">{{ $donation->status }}</span>
                                           @endif

                                       </td>
                                       <td>{{ $donation->donor->name }}</td>
                                       <td>{{ $donation->created_at->diffForHumans() }}</td>
                                       <td><span class="text-success">${{ $donation->amount }}</span></td>
                                   </tr>
                               </tbody>
                               @endforeach
                           </table>
                       </div>
                   </div>
               </div>
               <div class="ta-c bdT w-100 p-20"><a href="#">Check all the donations</a></div>
           </div>
       </div>
   </div>
   @endcan

@endsection
