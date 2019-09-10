<?php

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
        $this->call([
            UsersTableSeeder::class,
            TagsTableSeeder::class,
            RolesTableSeeder::class,
            OptionsTableSeeder::class,
            MailConfigSeeder::class,
            DevicesTableSeeder::class,
            CandidatesTableSeeder::class
        ]);
    }
}
