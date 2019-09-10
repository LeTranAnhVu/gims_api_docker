<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;


class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $group = DB::table('options')->where('group', '=', 'mail')->get();

        $mail = $group
            ->map(function ($row) {
                return [$row->key => $row->value];
            })
            ->collapse()
            ->all();

        config(['mail.driver' => array_key_exists('driver', $mail) ? $mail['driver'] : env('MAIL_DRIVER', 'smtp')]);
        config([
            'mail.host' => array_key_exists('driver', $mail) ? $mail['driver'] : env('MAIL_HOST', 'smtp.gmail.com')
        ]);
        config(['mail.port' => array_key_exists('driver', $mail) ? $mail['driver'] : env('MAIL_PORT', 587)]);
        config(['mail.username' => array_key_exists('driver', $mail) ? $mail['driver'] : env('MAIL_USERNAME')]);
        config(['mail.password' => array_key_exists('driver', $mail) ? $mail['driver'] : env('MAIL_PASSWORD')]);
    }
}
