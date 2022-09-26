<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $mail = getOption('mail_server');
        if ($mail) {  
            $mail = json_decode($mail);

            $config = array(
                'driver'     => 'smtp',
                'host'       => isset($mail->mail_host)? $mail->mail_host : env('MAIL_HOST'),
                'port'       => isset($mail->mail_port)? $mail->mail_port : env('MAIL_PORT'),
                'encryption' => isset($mail->encryption)? $mail->encryption : env('MAIL_ENCRYPTION'),
                'username'   => isset($mail->mail_username)? $mail->mail_username : env('MAIL_USERNAME'),
                'password'   => isset($mail->mail_password)? $mail->mail_password : env('MAIL_PASSWORD'),
                'from'       => [
                    'address' => isset($mail->sender_mail)? $mail->sender_mail : env('MAIL_FROM_ADDRESS'),
                    'name'=> isset($mail->sender_name)? $mail->sender_name : env('MAIL_FROM_NAME')
                ],
                'sendmail'   => '/usr/sbin/sendmail -bs',
                'pretend'    => false,
                'verify_peer'=> false,
            );

            Config::set('mail', $config);
        } 
    }
}


