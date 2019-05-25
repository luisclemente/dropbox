<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run ()
   {
      factory ( User::class, 1 )->create ( [
         'name'     => 'luis',
         'email'    => 'luis@mail.com',
         'password' => bcrypt ('.')
      ] );

      factory ( User::class, 1 )->create ( [
         'name'     => 'antonio',
         'email'    => 'antonio@mail.com',
         'password' => bcrypt ('.')
      ] );
   }
}
