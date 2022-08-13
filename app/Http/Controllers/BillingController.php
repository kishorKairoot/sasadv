<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plan;

class BillingController extends Controller
{
    public function save_payment(Request $request)
    {

        // dd($request->all());

        $plan_price = 'price_1LT1BzGLNvvdAB5udzfrKXa6';

        if ($request->plan === 'plus' ) {
             $plan_price = 'price_1LThR7GLNvvdAB5uH1ze20xt';
        } elseif ($request->plan === 'pro' ) {
             $plan_price = 'price_1LThU1GLNvvdAB5uQYU2azLU';
        } else {
            $plan_price = 'price_1LT1BzGLNvvdAB5udzfrKXa6';
        }
          

        $user = auth()->user();

        try{
            if ($user->subscribed('default')) {
                $user->updateDefaultPaymentMethod($request->payment_method);
            }else{

                $plan = Plan::where('name',$request->plan)->first();
                $user->plan_id = $plan->id;
                $user->trail_ends_at = null;
                $user->save();

                $user->newSubscription('default', $plan_price)->create($request->payment_method);
            }
        } catch(Exception $e){
            return back()->with(['alert' => 'Something Went Wrong!', 'alert_type' => 'error']);
        }

        return back()->with(['alert' => 'Your Payment Information Has Been Updated', 'alert_type' => 'success']);

        // echo "Payment Successfull.";
    }

    public function switch_plan(Request $request)
    {
        $plan_price = 'price_1LT1BzGLNvvdAB5udzfrKXa6';

        if ($request->plan === 'plus' ) {
             $plan_price = 'price_1LThR7GLNvvdAB5uH1ze20xt';
        } elseif ($request->plan === 'pro' ) {
             $plan_price = 'price_1LThU1GLNvvdAB5uQYU2azLU';
        } else {
            $plan_price = 'price_1LT1BzGLNvvdAB5udzfrKXa6';
        }

        $plan = Plan::where('name',$request->plan)->first();
        $user = auth()->user();

        try{

            $user->subscription('default')->swap($plan_price);
            $user->plan_id = $plan->id;
            $user->save();

        }catch(Exception $e){
            return back()->with(['alert' => 'Something Went Wrong!', 'alert_type' => 'error']);
        }

        return back()->with(['alert' => 'Your Plan Has Been Switch To '.ucfirst($request->plan).' Plan', 'alert_type' => 'success']);
    }


    public function invoiceDownload(Request $request, $invoiceId)
    {
        return $request->user()->downloadInvoice($invoiceId, [
            'vendor' => 'Sasadv',
            'product' => 'Sasadv Subscription',
        ]);
    }


    public function sub_check(Request $request, $subdomain)
    {
        echo $subdomain;
    }

}
