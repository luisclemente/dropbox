<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run ()
   {
      Permission::create ( [ 'name' => 'file.create', 'description' => 'Subir archivos' ] );
      Permission::create ( [ 'name' => 'file.store', 'description' => 'Guardar archivos' ] );
      Permission::create ( [ 'name' => 'file.images', 'description' => 'Imagenes subidas' ] );
      Permission::create ( [ 'name' => 'file.videos', 'description' => 'Videos subidos' ] );
      Permission::create ( [ 'name' => 'file.audios', 'description' => 'Audios subidos' ] );
      Permission::create ( [ 'name' => 'file.documents', 'description' => 'Documentos subidos' ] );

      Permission::create ( [ 'name' => 'role.index', 'description' => 'Ver todos los roles' ] );
      Permission::create ( [ 'name' => 'role.create', 'description' => 'Crear roles' ] );
      Permission::create ( [ 'name' => 'role.store', 'description' => 'Guardar roles' ] );
      Permission::create ( [ 'name' => 'role.edit', 'description' => 'Editar roles' ] );
      Permission::create ( [ 'name' => 'role.update', 'description' => 'Actualizar roles' ] );
      Permission::create ( [ 'name' => 'role.show', 'description' => 'Mostrar roles' ] );
      Permission::create ( [ 'name' => 'role.destroy', 'description' => 'Eliminar roles' ] );

      Permission::create ( [ 'name' => 'plan.index', 'description' => 'Ver todos los planes' ] );
      Permission::create ( [ 'name' => 'plan.create', 'description' => 'Crear planes' ] );
      Permission::create ( [ 'name' => 'plan.edit', 'description' => 'Editar planes' ] );
      Permission::create ( [ 'name' => 'plan.show', 'description' => 'Mostrar planes' ] );
      Permission::create ( [ 'name' => 'plan.destroy', 'description' => 'Eliminar planes' ] );

      $admin = Role::create ( [ 'name' => 'Admin' ] );
      $subscriber = Role::create ( [ 'name' => 'Subscriptor' ] );

      $admin->givePermissionTo ( Permission::all () ); // El usuario con rol admin tendrá todos los permisos
      $subscriber->givePermissionTo ( [
         'file.create',
         'file.store',
         'file.images',
         'file.videos',
         'file.audios',
         'file.documents'
      ] );

      $user = User::find ( 1 );
      $user2 = User::find(2);
      $user->assignRole ( 'Admin' );
      $user2->assignRole ( 'Subscriptor' );
   }
}
