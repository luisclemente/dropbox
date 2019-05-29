<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
   use HandlesAuthorization;

   public function payForThis ( User $user )
   {
      return ! $user->hasRole ( 'Admin|Subscriptor' );
   }

   /**
    * Create a new policy instance.
    *
    * @return void
    */
   public function __construct ()
   {
      //
   }
}
