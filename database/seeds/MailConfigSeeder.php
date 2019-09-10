<?php

use App\Models\Option;
use Illuminate\Database\Seeder;

class MailConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Option::class, 1)->create(['group' => 'mail', 'key' => 'driver', 'value' => 'smtp']);
        factory(Option::class, 1)->create(['group' => 'mail', 'key' => 'host', 'value' => 'smtp.gmail.com']);
        factory(Option::class, 1)->create(['group' => 'mail', 'key' => 'port', 'value' => '587']);
        factory(Option::class, 1)->create(['group' => 'mail', 'key' => 'username', 'value' => 'luuhoangnhan1080@gmail.com']);
        factory(Option::class, 1)->create(['group' => 'mail', 'key' => 'password', 'value' => 'orfcxnnsmvmqkiar']);
    }
}
