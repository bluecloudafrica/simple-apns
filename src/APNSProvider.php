<?php


namespace BlueCloud\SimpleAPNS;


use Illuminate\Support\ServiceProvider;

class APNSProvider extends ServiceProvider
{
    public function boot()
    {
       $this->publishes([
           __DIR__.'config/apns.php' => config_path("apns.php")
       ]);
    }

    public function register()
    {
        //dd("register");
    }
}
