# Smart Date Filter for Filament v4

[![Latest Version](https://img.shields.io/packagist/v/suleyman/filament-smart-date-filter)](https://packagist.org/packages/suleyman/filament-smart-date-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/suleyman/filament-smart-date-filter)](https://packagist.org/packages/suleyman/filament-smart-date-filter)
[![License](https://img.shields.io/packagist/l/suleyman/filament-smart-date-filter)](https://github.com/slym758/filament-smart-date-filter/blob/main/LICENSE)

A premium, feature-rich date range filter for Filament v4 with 14 languages, 23 themes, and dark mode support.

## Features

- 🌍 **14 Languages** - Turkish, English, German, French, Spanish, Italian, Portuguese, Russian, Arabic, Chinese, Japanese, Korean, Dutch, Polish
- 🎨 **23 Color Themes** - All Tailwind CSS colors
- 🌙 **Dark Mode** - Full dark mode support
- 📱 **Responsive** - Mobile-friendly design
- ⚡ **Quick Presets** - Today, Yesterday, Last 7/30 Days, This Month/Year, etc.
- 🎯 **Customizable** - Config file for easy customization

## Screenshots

https://hizliresim.com/pqb8qu4
https://hizliresim.com/f03rsks
https://hizliresim.com/5eqgk8b
https://hizliresim.com/6utafgf
https://hizliresim.com/cbka50h

mobile
https://hizliresim.com/r8jtk8s
https://hizliresim.com/g5dtjab

## Installation
```bash
composer require suleyman/filament-smart-date-filter
```

Publish config (optional):
```bash
php artisan vendor:publish --tag=smart-date-filter-config
```

## Usage
```php
use Suleyman\SmartDateFilter\SmartDateFilter;

public static function table(Table $table): Table
{
    return $table
        ->filters([
            SmartDateFilter::make()
                ->column('created_at'),
        ]);
}
```

## Configuration

Edit `config/smart-date-filter.php`:
```php
return [
    'locale' => 'tr',        // Language
    'theme' => 'amber',      // Color theme
    'format' => 'DD/MM/YYYY',
    'first_day_of_week' => 1,
];
```

## Available Themes

Grays: `slate`, `gray`, `zinc`, `neutral`, `stone`

Colors: `red`, `orange`, `amber`, `yellow`, `lime`, `green`, `emerald`, `teal`, `cyan`, `sky`, `blue`, `indigo`, `violet`, `purple`, `fuchsia`, `pink`, `rose`

## Supported Languages

`tr`, `en`, `de`, `fr`, `es`, `it`, `pt`, `ru`, `ar`, `zh`, `ja`, `ko`, `nl`, `pl`

## License

MIT