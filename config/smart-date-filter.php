<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Varsayılan Dil / Default Language
    |--------------------------------------------------------------------------
    |
    | Date picker'ın kullanacağı varsayılan dil.
    | Desteklenen diller:
    | 'tr' - Türkçe
    | 'en' - English
    | 'de' - Deutsch
    | 'fr' - Français
    | 'es' - Español
    | 'it' - Italiano
    | 'pt' - Português
    | 'ru' - Русский
    | 'ar' - العربية
    | 'zh' - 中文
    | 'ja' - 日本語
    | 'ko' - 한국어
    | 'nl' - Nederlands
    | 'pl' - Polski
    |
    */
    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Renk Teması / Color Theme
    |--------------------------------------------------------------------------
    |
    | Date picker'ın renk teması (Tailwind CSS renkleri).
    | Desteklenen temalar:
    |
    | Grays: 'slate', 'gray', 'zinc', 'neutral', 'stone'
    | Colors: 'red', 'orange', 'amber', 'yellow', 'lime', 'green', 'emerald',
    |         'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple',
    |         'fuchsia', 'pink', 'rose'
    |
    */
    'theme' => 'amber',

    /*
    |--------------------------------------------------------------------------
    | Asset Kaynağı / Asset Source
    |--------------------------------------------------------------------------
    |
    | JS ve CSS dosyalarının nereden yükleneceği.
    | 'cdn' - CDN üzerinden yükle (önerilen)
    | 'local' - Yerel dosyalardan yükle (vendor:publish gerektirir)
    |
    */
    'asset_source' => 'cdn',

    /*
    |--------------------------------------------------------------------------
    | CDN URL'leri / CDN URLs
    |--------------------------------------------------------------------------
    |
    | CDN kullanılıyorsa, asset URL'leri.
    | Özel CDN kullanmak istiyorsanız buradan değiştirebilirsiniz.
    |
    */
    'cdn' => [
        'jquery' => 'https://code.jquery.com/jquery-3.7.1.min.js',
        'moment' => 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js',
        'daterangepicker_js' => 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js',
        'daterangepicker_css' => 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css',
    ],

    /*
    |--------------------------------------------------------------------------
    | Varsayılan Aralıklar / Default Ranges
    |--------------------------------------------------------------------------
    |
    | Date picker'da gösterilecek hızlı seçim aralıkları.
    | false yaparak devre dışı bırakabilirsiniz.
    |
    */
    'show_ranges' => true,

    /*
    |--------------------------------------------------------------------------
    | Tarih Formatı / Date Format
    |--------------------------------------------------------------------------
    |
    | Tarihlerin gösterim formatı.
    |
    */
    'format' => 'DD/MM/YYYY',

    /*
    |--------------------------------------------------------------------------
    | Takvim Sayısı / Number of Calendars
    |--------------------------------------------------------------------------
    |
    | Aynı anda gösterilecek takvim sayısı. (1 veya 2)
    |
    */
    'calendars' => 2,

    /*
    |--------------------------------------------------------------------------
    | Tek Takvim Modu / Single Calendar Mode
    |--------------------------------------------------------------------------
    |
    | Takvim görünüm modu.
    | false - Her zaman çift takvim göster
    | true - Her zaman tek takvim göster
    | 'auto' - Responsive: Mobilde (< 768px) tek, masaüstünde çift takvim
    |
    */
    'single_calendar' => 'auto',

    /*
    |--------------------------------------------------------------------------
    | Hafta Başlangıcı / First Day of Week
    |--------------------------------------------------------------------------
    |
    | Haftanın hangi günle başlayacağı.
    | 0 = Pazar, 1 = Pazartesi
    |
    */
    'first_day_of_week' => 1,
];
