<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $user = new \App\Models\Users\User("johannes@jitesoft.com", "Johannes");
        EntityManager::persist($user);
        EntityManager::flush();

    }
}
