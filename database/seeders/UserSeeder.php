<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
        User::insert([
            "name"=> "admin2",
            "email"=> "admin2@gmail.com",
            "password"=> Hash::make("admin123"),
            "usertype"=> "admin",
        ]);
       
        
    }
    
}

