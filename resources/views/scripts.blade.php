@php
    $config = $config ?? config('smart-date-filter');
    $locale = $config['locale'] ?? 'tr';
    $assetSource = $config['asset_source'] ?? 'cdn';
    $cdn = $config['cdn'] ?? [];
    $format = $config['format'] ?? 'DD/MM/YYYY';
    $firstDay = $config['first_day_of_week'] ?? 1;
    $showRanges = $config['show_ranges'] ?? true;
    $theme = $config['theme'] ?? 'amber';

    // Tüm Tailwind renkleri
    $themeColors = [
        'slate' => '#64748b',
        'gray' => '#6b7280',
        'zinc' => '#71717a',
        'neutral' => '#737373',
        'stone' => '#78716c',
        'red' => '#ef4444',
        'orange' => '#f97316',
        'amber' => '#f59e0b',
        'yellow' => '#eab308',
        'lime' => '#84cc16',
        'green' => '#22c55e',
        'emerald' => '#10b981',
        'teal' => '#14b8a6',
        'cyan' => '#06b6d4',
        'sky' => '#0ea5e9',
        'blue' => '#3b82f6',
        'indigo' => '#6366f1',
        'violet' => '#8b5cf6',
        'purple' => '#a855f7',
        'fuchsia' => '#d946ef',
        'pink' => '#ec4899',
        'rose' => '#f43f5e',
    ];
    $primaryColor = $themeColors[$theme] ?? '#f59e0b';

    // Dil çevirileri - 10+ dil desteği
    $translations = [
        'tr' => [
            'today' => 'Bugün',
            'yesterday' => 'Dün',
            'last_7_days' => 'Son 7 Gün',
            'last_30_days' => 'Son 30 Gün',
            'this_month' => 'Bu Ay',
            'last_month' => 'Geçen Ay',
            'this_year' => 'Bu Yıl',
            'last_year' => 'Geçen Yıl',
            'custom' => 'Özel',
            'apply' => 'Uygula',
            'cancel' => 'İptal',
            'from' => 'Başlangıç',
            'to' => 'Bitiş',
            'week' => 'H',
            'days' => ['Pz', 'Pt', 'Sa', 'Ça', 'Pe', 'Cu', 'Ct'],
            'months' => ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
            'placeholder' => 'Tarih aralığı seçin...',
            'label' => 'Tarih',
        ],
        'en' => [
            'today' => 'Today',
            'yesterday' => 'Yesterday',
            'last_7_days' => 'Last 7 Days',
            'last_30_days' => 'Last 30 Days',
            'this_month' => 'This Month',
            'last_month' => 'Last Month',
            'this_year' => 'This Year',
            'last_year' => 'Last Year',
            'custom' => 'Custom',
            'apply' => 'Apply',
            'cancel' => 'Cancel',
            'from' => 'From',
            'to' => 'To',
            'week' => 'W',
            'days' => ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            'months' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'placeholder' => 'Select date range...',
            'label' => 'Date',
        ],
        'de' => [
            'today' => 'Heute',
            'yesterday' => 'Gestern',
            'last_7_days' => 'Letzte 7 Tage',
            'last_30_days' => 'Letzte 30 Tage',
            'this_month' => 'Dieser Monat',
            'last_month' => 'Letzter Monat',
            'this_year' => 'Dieses Jahr',
            'last_year' => 'Letztes Jahr',
            'custom' => 'Benutzerdefiniert',
            'apply' => 'Anwenden',
            'cancel' => 'Abbrechen',
            'from' => 'Von',
            'to' => 'Bis',
            'week' => 'W',
            'days' => ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
            'months' => ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
            'placeholder' => 'Datumsbereich auswählen...',
            'label' => 'Datum',
        ],
        'fr' => [
            'today' => "Aujourd'hui",
            'yesterday' => 'Hier',
            'last_7_days' => '7 derniers jours',
            'last_30_days' => '30 derniers jours',
            'this_month' => 'Ce mois',
            'last_month' => 'Mois dernier',
            'this_year' => 'Cette année',
            'last_year' => 'Année dernière',
            'custom' => 'Personnalisé',
            'apply' => 'Appliquer',
            'cancel' => 'Annuler',
            'from' => 'De',
            'to' => 'À',
            'week' => 'S',
            'days' => ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            'months' => ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            'placeholder' => 'Sélectionner une période...',
            'label' => 'Date',
        ],
        'es' => [
            'today' => 'Hoy',
            'yesterday' => 'Ayer',
            'last_7_days' => 'Últimos 7 días',
            'last_30_days' => 'Últimos 30 días',
            'this_month' => 'Este mes',
            'last_month' => 'Mes pasado',
            'this_year' => 'Este año',
            'last_year' => 'Año pasado',
            'custom' => 'Personalizado',
            'apply' => 'Aplicar',
            'cancel' => 'Cancelar',
            'from' => 'Desde',
            'to' => 'Hasta',
            'week' => 'S',
            'days' => ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            'months' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            'placeholder' => 'Seleccionar rango de fechas...',
            'label' => 'Fecha',
        ],
        'it' => [
            'today' => 'Oggi',
            'yesterday' => 'Ieri',
            'last_7_days' => 'Ultimi 7 giorni',
            'last_30_days' => 'Ultimi 30 giorni',
            'this_month' => 'Questo mese',
            'last_month' => 'Mese scorso',
            'this_year' => "Quest'anno",
            'last_year' => 'Anno scorso',
            'custom' => 'Personalizzato',
            'apply' => 'Applica',
            'cancel' => 'Annulla',
            'from' => 'Da',
            'to' => 'A',
            'week' => 'S',
            'days' => ['Do', 'Lu', 'Ma', 'Me', 'Gi', 'Ve', 'Sa'],
            'months' => ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
            'placeholder' => 'Seleziona intervallo date...',
            'label' => 'Data',
        ],
        'pt' => [
            'today' => 'Hoje',
            'yesterday' => 'Ontem',
            'last_7_days' => 'Últimos 7 dias',
            'last_30_days' => 'Últimos 30 dias',
            'this_month' => 'Este mês',
            'last_month' => 'Mês passado',
            'this_year' => 'Este ano',
            'last_year' => 'Ano passado',
            'custom' => 'Personalizado',
            'apply' => 'Aplicar',
            'cancel' => 'Cancelar',
            'from' => 'De',
            'to' => 'Até',
            'week' => 'S',
            'days' => ['Do', 'Se', 'Te', 'Qu', 'Qi', 'Se', 'Sá'],
            'months' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            'placeholder' => 'Selecione o intervalo de datas...',
            'label' => 'Data',
        ],
        'ru' => [
            'today' => 'Сегодня',
            'yesterday' => 'Вчера',
            'last_7_days' => 'Последние 7 дней',
            'last_30_days' => 'Последние 30 дней',
            'this_month' => 'Этот месяц',
            'last_month' => 'Прошлый месяц',
            'this_year' => 'Этот год',
            'last_year' => 'Прошлый год',
            'custom' => 'Произвольный',
            'apply' => 'Применить',
            'cancel' => 'Отмена',
            'from' => 'С',
            'to' => 'По',
            'week' => 'Н',
            'days' => ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            'months' => ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            'placeholder' => 'Выберите диапазон дат...',
            'label' => 'Дата',
        ],
        'ar' => [
            'today' => 'اليوم',
            'yesterday' => 'أمس',
            'last_7_days' => 'آخر 7 أيام',
            'last_30_days' => 'آخر 30 يوم',
            'this_month' => 'هذا الشهر',
            'last_month' => 'الشهر الماضي',
            'this_year' => 'هذا العام',
            'last_year' => 'العام الماضي',
            'custom' => 'مخصص',
            'apply' => 'تطبيق',
            'cancel' => 'إلغاء',
            'from' => 'من',
            'to' => 'إلى',
            'week' => 'أ',
            'days' => ['أح', 'إث', 'ثل', 'أر', 'خم', 'جم', 'سب'],
            'months' => ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
            'placeholder' => 'اختر نطاق التاريخ...',
            'label' => 'التاريخ',
        ],
        'zh' => [
            'today' => '今天',
            'yesterday' => '昨天',
            'last_7_days' => '最近7天',
            'last_30_days' => '最近30天',
            'this_month' => '本月',
            'last_month' => '上月',
            'this_year' => '今年',
            'last_year' => '去年',
            'custom' => '自定义',
            'apply' => '应用',
            'cancel' => '取消',
            'from' => '从',
            'to' => '至',
            'week' => '周',
            'days' => ['日', '一', '二', '三', '四', '五', '六'],
            'months' => ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
            'placeholder' => '选择日期范围...',
            'label' => '日期',
        ],
        'ja' => [
            'today' => '今日',
            'yesterday' => '昨日',
            'last_7_days' => '過去7日間',
            'last_30_days' => '過去30日間',
            'this_month' => '今月',
            'last_month' => '先月',
            'this_year' => '今年',
            'last_year' => '去年',
            'custom' => 'カスタム',
            'apply' => '適用',
            'cancel' => 'キャンセル',
            'from' => '開始',
            'to' => '終了',
            'week' => '週',
            'days' => ['日', '月', '火', '水', '木', '金', '土'],
            'months' => ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            'placeholder' => '日付範囲を選択...',
            'label' => '日付',
        ],
        'ko' => [
            'today' => '오늘',
            'yesterday' => '어제',
            'last_7_days' => '지난 7일',
            'last_30_days' => '지난 30일',
            'this_month' => '이번 달',
            'last_month' => '지난 달',
            'this_year' => '올해',
            'last_year' => '작년',
            'custom' => '사용자 지정',
            'apply' => '적용',
            'cancel' => '취소',
            'from' => '시작',
            'to' => '종료',
            'week' => '주',
            'days' => ['일', '월', '화', '수', '목', '금', '토'],
            'months' => ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            'placeholder' => '날짜 범위 선택...',
            'label' => '날짜',
        ],
        'nl' => [
            'today' => 'Vandaag',
            'yesterday' => 'Gisteren',
            'last_7_days' => 'Laatste 7 dagen',
            'last_30_days' => 'Laatste 30 dagen',
            'this_month' => 'Deze maand',
            'last_month' => 'Vorige maand',
            'this_year' => 'Dit jaar',
            'last_year' => 'Vorig jaar',
            'custom' => 'Aangepast',
            'apply' => 'Toepassen',
            'cancel' => 'Annuleren',
            'from' => 'Van',
            'to' => 'Tot',
            'week' => 'W',
            'days' => ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'],
            'months' => ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'],
            'placeholder' => 'Selecteer datumbereik...',
            'label' => 'Datum',
        ],
        'pl' => [
            'today' => 'Dzisiaj',
            'yesterday' => 'Wczoraj',
            'last_7_days' => 'Ostatnie 7 dni',
            'last_30_days' => 'Ostatnie 30 dni',
            'this_month' => 'Ten miesiąc',
            'last_month' => 'Poprzedni miesiąc',
            'this_year' => 'Ten rok',
            'last_year' => 'Poprzedni rok',
            'custom' => 'Niestandardowy',
            'apply' => 'Zastosuj',
            'cancel' => 'Anuluj',
            'from' => 'Od',
            'to' => 'Do',
            'week' => 'T',
            'days' => ['Nd', 'Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'So'],
            'months' => ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
            'placeholder' => 'Wybierz zakres dat...',
            'label' => 'Data',
        ],
    ];

    $t = $translations[$locale] ?? $translations['en'];
@endphp

<script src="{{ $cdn['jquery'] ?? 'https://code.jquery.com/jquery-3.7.1.min.js' }}"></script>
<script src="{{ $cdn['moment'] ?? 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js' }}"></script>
<script
    src="{{ $cdn['daterangepicker_js'] ?? 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js' }}"></script>
@php
    $singleCalendar = $config['single_calendar'] ?? false;
    $singleCalendarValue = $singleCalendar === 'auto' ? 'auto' : ($singleCalendar ? 'true' : 'false');
@endphp
<script>
    // SmartDateFilter Global Config
    window.SmartDateFilterConfig = {
        locale: '{{ $locale }}',
        format: '{{ $format }}',
        firstDay: {{ $firstDay }},
        showRanges: {{ $showRanges ? 'true' : 'false' }},
        singleCalendar: '{{ $singleCalendarValue }}',
        theme: '{{ $theme }}',
        primaryColor: '{{ $primaryColor }}',
        translations: {!! json_encode($t) !!}
    };

    // Filament filter panelinin daterangepicker tıklamalarında kapanmasını engelle
    const drpObserver = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            mutation.addedNodes.forEach(function (node) {
                if (node.classList && node.classList.contains("daterangepicker")) {
                    node.setAttribute("x-ignore", "");
                    node.addEventListener("click", function (e) {
                        e.stopPropagation();
                    }, false);
                    node.addEventListener("mousedown", function (e) {
                        e.stopPropagation();
                    }, false);
                }
            });
        });
    });

    drpObserver.observe(document.body, { childList: true, subtree: true });

    // Mevcut daterangepicker elementleri için de uygula
    document.querySelectorAll(".daterangepicker").forEach(function (el) {
        el.setAttribute("x-ignore", "");
        el.addEventListener("click", function (e) {
            e.stopPropagation();
        }, false);
        el.addEventListener("mousedown", function (e) {
            e.stopPropagation();
        }, false);
    });
</script>