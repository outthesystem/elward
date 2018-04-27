<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'cuenta.elwardoficial@gmail.com',
          'password' => bcrypt('123456'),
      ]);
      DB::table('roles')->insert([
          'name' => 'admin',
          'guard_name' => 'admin'
      ]);
      DB::table('model_has_roles')->insert([
          'role_id' => '1',
          'model_id' => '1',
          'model_type' => 'App\User'
      ]);
      DB::table('permissions')->insert([
          'name' => 'ver_dashboard',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'ver_categorias',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'crear_categorias',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'editar_categorias',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'actualizar_categorias',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'eliminar_categorias',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'ver_publicaciones',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'crear_publicaciones',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'editar_publicaciones',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'eliminar_publicaciones',
          'guard_name' => 'web'
      ]);
      DB::table('permissions')->insert([
          'name' => 'actualizar_publicaciones',
          'guard_name' => 'web'
      ]);
    }
}
