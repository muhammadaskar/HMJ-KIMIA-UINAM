<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'hmjkimia@hmjkimiauinam.com',
            'password' => bcrypt('123admin321')
        ]);

        $admin->assignRole('admin');
    }
}
