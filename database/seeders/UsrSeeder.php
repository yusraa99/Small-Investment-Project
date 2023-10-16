<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'first_name'=>'Admin',
            'last_name'=>'Test',
            'email'=>'admin@admin.com',
            'gender'=>'female',
            'role'=>'superAdmin',
            'birth_date'=>'2023-06-25',
            'status'=>'active',                
            'password'=>Hash::make('admin@1234'),                


        ]);
        $user2=User::create([
            'first_name'=>'admin',
            'last_name'=>'Testing',
            'email'=>'admintest@admin.com',
            'gender'=>'male',
            'role'=>'admin',
            'birth_date'=>'2023-06-25',
            'status'=>'active',                
            'password'=>Hash::make('admin@12345'),                


        ]);
        $user->assignRole('superAdmin');
        $user2->assignRole('admin');
    }
}
