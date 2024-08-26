<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(

            [
                'name' => 'Linkeo Admin',
                'email' => 'admin@linkeo.com',
                'password' => Hash::make( 'l1Nk#oS23'),
                'role_id' => '1',
            ]
        );
    }
}
