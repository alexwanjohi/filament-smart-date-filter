<?php

namespace Suleyman\SmartDateFilter;

use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SmartDateFilterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'smart-date-filter');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'smart-date-filter');

        // Config dosyasını publish edilebilir yap
        $this->publishes([
            __DIR__ . '/../config/smart-date-filter.php' => config_path('smart-date-filter.php'),
        ], 'smart-date-filter-config');

        // Asset'leri publish edilebilir yap
        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/smart-date-filter'),
        ], 'smart-date-filter-assets');

        // CSS ve JS'i Filament paneline ekle
        FilamentView::registerRenderHook(
            'panels::head.end',
            fn(): string => view('smart-date-filter::styles', [
                'config' => config('smart-date-filter'),
            ])->render()
        );

        FilamentView::registerRenderHook(
            'panels::body.end',
            fn(): string => view('smart-date-filter::scripts', [
                'config' => config('smart-date-filter'),
            ])->render()
        );
    }

    public function register(): void
    {
        // Config dosyasını birleştir
        $this->mergeConfigFrom(
            __DIR__ . '/../config/smart-date-filter.php',
            'smart-date-filter'
        );
    }
}
