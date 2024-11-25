<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            try {
                $setting = Setting::first();
                if (!$setting) {
                    $setting = Setting::create([
                        'nama_aplikasi' => 'SMK NEGERI 4 BOGOR',
                        'logo' => 'logo-default.png',
                        'favicon' => 'favicon.ico',
                        'footer_aplikasi' => '© ' . date('Y') . ' SMK NEGERI 4 BOGOR',
                        'background' => 'background-default.jpg'
                    ]);
                }
                $view->with('setting', $setting);
            } catch (\Exception $e) {
                $setting = new Setting([
                    'nama_aplikasi' => 'SMK NEGERI 4 BOGOR',
                    'logo' => 'logo-default.png',
                    'favicon' => 'favicon.ico',
                    'footer_aplikasi' => '© ' . date('Y') . ' SMK NEGERI 4 BOGOR',
                    'background' => 'background-default.jpg'
                ]);
                $view->with('setting', $setting);
            }
        });
    }
}
