<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $notificationCount = \App\Models\Notification::where('read_at', null)->count();

            $menu = config('adminlte.menu', []);

            $exists = collect($menu)->contains(function ($item) {
                return isset($item['text']) && $item['text'] === 'Notifications';
            });

            if (! $exists) {
                $menu[] = [
                    'text' => 'Notifications',
                    'url'  => 'admin/notifications',
                    'icon' => 'fas fa-bell',
                    'label' => $notificationCount,
                    'label_color' => 'danger',
                ];
                config(['adminlte.menu' => $menu]);
            }
        });
    }
}
