<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new \App\User([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make(123),
        'is_admin' => 1,
      ]);
      $user->save();

    }
}
