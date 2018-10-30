@extends('layouts.front.app')


@section('content')
    <section class="container">
        <div class="card card-padded">

            <form action="subscriptions" method="POST" id="subscribe-form">

                {!! csrf_field() !!}
                <div class="section-header">
                    <h2>Subscription Info</h2>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-4">

                            <div class="subscription-option">
                                <input type="radio" id="plan-bronze" name="plan" value="bronze" checked>
                                <label for="plan-bronze">
                                    <span class="plan-price">$5 <small>/mo</small></span>
                                    <span class="plan-name">Bronze</span>
                                </label>
                            </div>

                        </div>
                        <div class="col-xs-4">

                            <div class="subscription-option">
                                <input type="radio" id="plan-silver" name="plan" value="plan_DsiuTMvpHTPROp">
                                <label for="plan-silver">
                                    <span class="plan-price">$10 <small>/mo</small></span>
                                    <span class="plan-name">Silver</span>
                                </label>
                            </div>

                        </div>
                        <div class="col-xs-4">

                            <div class="subscription-option">
                                <input type="radio" id="plan-gold" name="plan" value="gold">
                                <label for="plan-gold">
                                    <span class="plan-price">$15 <small>/mo</small></span>
                                    <span class="plan-name">Gold</span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- credit card info --}}
                <div class="section-header">
                    <h2>Credit Card Info</h2>
                </div>

                <div class="form-group row">
                    {{-- credit card number --}}
                    <div class="col-xs-8">
                        <label>Credit Card Number</label>
                        <input type="text" class="form-control" name="number" placeholder="4242 4242 4242 4242" data-stripe="number">
                    </div>

                    {{-- cvc --}}
                    <div class="col-xs-4">
                        <label>CVC</label>
                        <input type="text" class="form-control" name="cvc" placeholder="123" data-stripe="cvc">
                    </div>
                </div>

                <div class="form-group row">

                    {{-- exp month --}}
                    <div class="col-xs-3">
                        <label>Expiration Month</label>
                        <input type="text" class="form-control" name="exp-month" placeholder="08" data-stripe="exp-month">
                    </div>

                    {{-- exp year --}}
                    <div class="col-xs-3">
                        <label>Expiration Year</label>
                        <input type="text" class="form-control" name="exp-year" placeholder="2020" data-stripe="exp-year">
                    </div>
                </div>

                <div class="stripe-errors"></div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-lg btn-success btn-block">Join</button>
                </div>

            </form>

        </div>
    </section>

@endsection
