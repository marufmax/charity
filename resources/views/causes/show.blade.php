@extends('layouts.fronted')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cause #{{ $cause->id }}</h4>
                </div>
                <div class="gaadiex-list">
                        <div class="gaadiex-list-item border-b-1">
                            <img style="max-height: 200px" src="{{ asset('/images/causes') . '/' . $cause->featured_image }}">
                            <div class="gaadiex-list-item-text">
                                <h3><a href="/causes/{{ $cause->slug }}"> {{ $cause->title }}</a></h3>
                                <p>Posted on: {{ $cause->created_at->diffForHumans() }}</p>
    {{--                            <h4>Brunch this weekend?</h4>--}}
                                <p>  {{ $cause->description }}</p>
                            </div>
                        </div>
                    <button class="btn btn-outline-info"> Make Donation</button>

                    @auth()
                        <form id="payment-form" class="w-full p-6" method="POST" action="{{ route('store-payment', $cause->slug) }}">
                            @csrf
                            <div class="flex flex-wrap mb-6">
                                <label for="card-element" class="block text-gray-700 text-sm font-bold mb-2">
                                    Credit Card Info
                                </label>
                                <input type="hidden" name="cause_id" value="{{ $cause->id }}">
                                <label for="name">Name</label>
                                <input id="name" name="name" class="form-control" type="text" placeholder="Your name"/>
                                <label for="amount">Amount</label>
                                <input id="amount" name="amount" class="form-control" type="text" placeholder="Amount"/>

                                <label>Card</label>
                                <div id="card-element" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></div>
                                <div id="card-errors" class="text-red-400 text-bold mt-2 text-sm font-medium"></div>
                            </div>

                            <!-- Stripe Elements Placeholder -->
                            <div class="flex flex-wrap mt-6">
                                <button type="submit" id="card-button" class="btn btn-outline-success inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                   Donate
                                </button>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');
    console.log(stripe);
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');
    const cardHolderName = document.getElementById('name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    let validCard = false;
    const cardError = document.getElementById('card-errors');
    cardElement.addEventListener('change', function(event) {

        if (event.error) {
            validCard = false;
            cardError.textContent = event.error.message;
        } else {
            validCard = true;
            cardError.textContent = '';
        }
    });
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', async (e) => {
        event.preventDefault();
        const { paymentMethod, error } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: { name: cardHolderName.value }
            }
        );
        if (error) {
            // Display "error.message" to the user...
            console.log(error);
        } else {
            // The card has been verified successfully...
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    });

</script>
@endsection
