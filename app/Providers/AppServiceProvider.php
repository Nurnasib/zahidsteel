<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Setting;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
        View::composer('*', function ($view) {
            $setting = Setting::find(1);
            $view->with('setting', $setting);
        });

        // Navigation menu (managed in admin → Navigation Menu)
        View::composer('layouts.frontend.header', function ($view) {
            $view->with('navMenus', Menu::with(['page', 'children' => fn ($q) => $q->where('status', true)->with('page')])
                ->whereNull('parent_id')
                ->where('status', true)
                ->orderBy('serial')
                ->orderBy('id')
                ->get()
                ->each(fn ($menu) => $menu->setRelation('navChildren', $menu->navChildren())));
        });
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
