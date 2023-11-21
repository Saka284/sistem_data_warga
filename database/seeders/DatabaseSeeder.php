<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin1',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Saka wijaya',
            'username' => 'sakawijaya',
            'password' => Hash::make('sakawijaya123'),
            'role' => 'warga',
        ]);

        DB::table('users')->insert([
            'name' => 'Wagiman',
            'username' => 'wagiman',
            'password' => Hash::make('wagiman123'),
            'role' => 'satpam',
        ]);
    }
}
