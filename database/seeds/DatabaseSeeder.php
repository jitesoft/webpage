<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(\Jitesoft\Seeders\PageSeeder::class);
        $this->call(\Jitesoft\Seeders\UserSeeder::class);
    }
}
$user = new \App\Models\Users\User("johannes@jitesoft.com", "Johannes");
