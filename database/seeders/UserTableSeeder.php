<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Reuben Siama',
            'email' => 'reubensiama91@gmail.com',
            'password' => bcrypt('sanghalhriamapa')
        ]);
    }
}
