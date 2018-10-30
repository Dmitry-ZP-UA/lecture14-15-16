<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class TestPay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:testpay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        /*
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_KCgJz4Z2Uwgi9mdfSSvilGMV");

        $product = \Stripe\Product::create([
            'name' => 'My SaaS Platform',
            'type' => 'service',
        ]);
        */

        /*
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_KCgJz4Z2Uwgi9mdfSSvilGMV");

        $plan = \Stripe\Plan::create([
            'product' => 'prod_CbvTFuXWh7BPJH',
            'nickname' => 'SaaS Platform USD',
            'interval' => 'month',
            'currency' => 'usd',
            'amount' => 10000,
        ]);
        */



    /*
        \Stripe\Stripe::setApiKey("sk_test_KCgJz4Z2Uwgi9mdfSSvilGMV");

        $subscription = \Stripe\Subscription::create([
            'customer' => 'cus_Dscp1GM2HUrur1',
            'items' => [['plan' => 'plan_Dsfqin70W2wDfx']],
        ]);

    */

   // $this->info(User::find(2));

        if (Auth::check()) {

            $user = Auth::user()->id;
        }

        $this->info(Auth::check());

    }
}
