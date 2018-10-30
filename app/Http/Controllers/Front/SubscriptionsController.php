<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 30.10.18
 * Time: 14:07
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;

class SubscriptionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            return view('front.subscriptions.index');
    }

    public function processSubscribe(Request $request)
    {

            Stripe::setApiKey("sk_test_KCgJz4Z2Uwgi9mdfSSvilGMV");

            $request->user()->newSubscription('main', $request->input('plan'))
                ->create($request->input('stripe_token'));

            return redirect('/');

    }


}
