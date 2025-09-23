<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'name'=>'admin',
            'email'=>'muachifid@gmail.com',
            'isAdmin'=>1,
            'password' => Hash::make(123456789)
        ]);

    }
}
