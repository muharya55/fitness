<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(MemberSeeder::class);
        $this->call(KategoriSeeder::class);
        // $this->call(PembayaranSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}