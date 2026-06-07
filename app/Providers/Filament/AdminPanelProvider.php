<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $brandName = 'PO. Dinamis Admin';
        $brandLogoUrl = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $siteName = \App\Models\Setting::where('key', 'site_name')->value('value') ?: 'PO. Dinamis';
                $brandName = $siteName . ' Admin';
                $logo = \App\Models\Setting::where('key', 'site_logo')->value('value');
                if ($logo) {
                    $brandLogoUrl = asset(\Illuminate\Support\Facades\Storage::url($logo));
                }
            }
        } catch (\Exception $e) {}

        if ($brandLogoUrl) {
            $brandHtml = new \Illuminate\Support\HtmlString('
                <div style="display: flex; align-items: center; gap: 10px;">
                    <img src="' . $brandLogoUrl . '" alt="Logo" style="height: 35px; border-radius: 6px;">
                    <span style="font-weight: bold; font-size: 1.2rem; line-height: 1;">' . $brandName . '</span>
                </div>
            ');
        } else {
            $brandHtml = $brandName;
        }

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(\App\Filament\Pages\Auth\Login::class)
            ->brandName($brandHtml)
            ->colors([
                'primary' => Color::Red,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
