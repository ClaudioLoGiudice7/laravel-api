<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = new User;
        $user->name = "Claudio Lo Giudice";
        $user->email = "claudiologiudice6@gmail.com";
        $user->password = "claudiolaravel";
        
        $user->save();
    }
}