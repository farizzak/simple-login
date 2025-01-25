<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'username' => 'administrator',
            'password' => bcrypt('rahasia123'),
            'email' => 'admin@cobain.web.id',
            // 'role' => '1',
        ]);
    }
}
