<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Subscription;
use Eloquent;
use Illuminate\Http\Request;
use Stripe\Stripe;

/**
 * Post
 *
 * @mixin Eloquent
 */
class SubscriptionController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index ()
   {
      $plans = Plan::all ();
      return view ( 'index', compact ( 'plans' ) );
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store ( Request $request )
   {
      $token = $request->stripeToken;
      $subscription = $request->plan_type;

      auth ()->user ()->newSubscription ( 'main', $subscription )->create ( $token );
      auth ()->user ()->assignRole ( 'Subscriptor' );

      return back ()->with ( 'info', [ 'success', 'Suscripcion completada' ] );
   }

   public function resume ()
   {
      $subscription = request ()->user ()->subscription ( request ( 'plan_name' ) );

      if ( $subscription->cancelled () && $subscription->onGracePeriod () )
      {
         request ()->user ()->subscription ( request ( 'plan_name' ) )->resume ();
         return back ()->with ( 'info', [ 'success', 'La suscripcion continuará' ] );
      }

      return back ();
   }

   public function cancel ()
   {
      auth ()->user ()->subscription ( request ( 'plan_name' ) )->cancel ();
      return back ()->with ( 'info', [ 'success', 'La suscripción se ha cancelado' ] );
   }

   public function subscriptions ()
   {
      $subscriptions = auth ()->user ()->hasRole ( 'Admin' ) ? Subscription::all () : auth ()->user ()->subscriptions;
      return view ( 'admin.subscriptions.index', compact ( 'subscriptions' ) );
   }

   /**
    * Display the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
   /* public function show ( $id )
    {
       $plan = Plan::find ( $id );
       return view ( 'admin.plans.show', compact ( 'plan' ) );
    }*/

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
   /* public function edit ( $id )
    {
       $plan = Plan::find ( $id );
       return view ( 'admin.plans.edit', compact ( 'plan' ) );
    }*/

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
   /*  public function update ( Request $request, $id )
     {
        $plan = Plan::find ( $id );
        $plan->update ( $request->all () );
        return back ()->with ( 'info', [ 'success', 'Plan actualizado correctamente' ] );
     }*/

   /**
    * Remove the specified resource from storage.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    * @throws \Exception
    */
   /*  public function destroy ( $id )
     {
        $plan = Plan::find ( $id )->delete ();
        return back ()->with ( 'info', [ 'success', 'Plan eliminado correctamente' ] );
     }*/
}
