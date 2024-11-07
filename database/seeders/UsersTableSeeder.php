<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = User::create([
            'first_name' => 'Lazaro',
            'last_name' => 'Magaia',
            'phone1' => '827017601',
            'phone2' => '827017602',
            'email' => 'llmagaia2@gmail.com',
            'password' => bcrypt('password'), // Hash the password
        ]);

        // Assign role to the user
        $user->assignRole('admin'); // Ensure the role 'admin' exists
      
        /*$user = User::create([
            'first_name' => 'Lazaro',
            'last_name' => 'Magaia',
            'phone1' => '827017601',
            'phone2' => '827017602',
            'email' => 'llmagaia3@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('password'), // Hash the password
        ]);

        // Assign role to the user
        $user->assignRole('cliente'); // Ensure the role 'admin' exists
          */
    }
}
