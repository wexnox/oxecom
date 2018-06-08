@extends ('layouts.app')

@section('title')
    Handlekurv
@endsection
@section('content')
    {{-- TODO: Sette på placeholders--}}
    <div class="col-sm-6 col-md-4">
        <h1>Checkout</h1>
        <h4>Your Total: Kr {{ $total }}</h4>
        <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
            {{ Session::get('error') }}
        </div>
        <form action="{{ route('checkout') }}" method="post" id="checkout-form">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="card-name">Card Holder Name</label>
                    <input type="text" id="card-name" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="card-number">Credit Card Number</label>
                    <p>Bruk Kort Nr: 4242 4242 4242 4242</p>
                    <input type="text" id="card-number" class="form-control" placeholder="4242 4242 4242 4242" required>
                </div>

                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="card-expiry-month">Expiration Month</label>
                            <input type="text" id="card-expiry-month" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="card-expiry-year">Expiration Year</label>
                                <input type="text" id="card-expiry-year" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="card-cvc">CVC</label>
                    <input type="text" id="card-cvc" class="form-control" required>
                </div>

            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">Buy Now</button>
        </form>
    </div>

@endsection
@section('scripts')
    <script src="https://js.stripe.com/v2/"></script>
    {{--<script src="https://js.stripe.com/v3/"></script>--}}
    <script src="{{ URL::to('js/checkout.js') }}"></script>
@endsection