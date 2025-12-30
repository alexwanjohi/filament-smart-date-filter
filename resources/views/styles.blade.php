@php
    $config = $config ?? config('smart-date-filter');
    $theme = $config['theme'] ?? 'amber';
    $assetSource = $config['asset_source'] ?? 'cdn';
    $cdn = $config['cdn'] ?? [];

    // Tüm Tailwind CSS Renkleri
    $themes = [
        // Grays
        'slate' => [
            'primary' => '#64748b',
            'primary_dark' => '#475569',
            'primary_darker' => '#334155',
            'range_bg' => '#f1f5f9',
            'range_text' => '#334155',
            'range_bg_dark' => 'rgba(100, 116, 139, 0.2)',
            'range_text_dark' => '#94a3b8',
        ],
        'gray' => [
            'primary' => '#6b7280',
            'primary_dark' => '#4b5563',
            'primary_darker' => '#374151',
            'range_bg' => '#f3f4f6',
            'range_text' => '#374151',
            'range_bg_dark' => 'rgba(107, 114, 128, 0.2)',
            'range_text_dark' => '#9ca3af',
        ],
        'zinc' => [
            'primary' => '#71717a',
            'primary_dark' => '#52525b',
            'primary_darker' => '#3f3f46',
            'range_bg' => '#f4f4f5',
            'range_text' => '#3f3f46',
            'range_bg_dark' => 'rgba(113, 113, 122, 0.2)',
            'range_text_dark' => '#a1a1aa',
        ],
        'neutral' => [
            'primary' => '#737373',
            'primary_dark' => '#525252',
            'primary_darker' => '#404040',
            'range_bg' => '#f5f5f5',
            'range_text' => '#404040',
            'range_bg_dark' => 'rgba(115, 115, 115, 0.2)',
            'range_text_dark' => '#a3a3a3',
        ],
        'stone' => [
            'primary' => '#78716c',
            'primary_dark' => '#57534e',
            'primary_darker' => '#44403c',
            'range_bg' => '#f5f5f4',
            'range_text' => '#44403c',
            'range_bg_dark' => 'rgba(120, 113, 108, 0.2)',
            'range_text_dark' => '#a8a29e',
        ],
        // Colors
        'red' => [
            'primary' => '#ef4444',
            'primary_dark' => '#dc2626',
            'primary_darker' => '#b91c1c',
            'range_bg' => '#fee2e2',
            'range_text' => '#991b1b',
            'range_bg_dark' => 'rgba(239, 68, 68, 0.2)',
            'range_text_dark' => '#f87171',
        ],
        'orange' => [
            'primary' => '#f97316',
            'primary_dark' => '#ea580c',
            'primary_darker' => '#c2410c',
            'range_bg' => '#ffedd5',
            'range_text' => '#9a3412',
            'range_bg_dark' => 'rgba(249, 115, 22, 0.2)',
            'range_text_dark' => '#fb923c',
        ],
        'amber' => [
            'primary' => '#f59e0b',
            'primary_dark' => '#d97706',
            'primary_darker' => '#b45309',
            'range_bg' => '#fef3c7',
            'range_text' => '#92400e',
            'range_bg_dark' => 'rgba(245, 158, 11, 0.2)',
            'range_text_dark' => '#fbbf24',
        ],
        'yellow' => [
            'primary' => '#eab308',
            'primary_dark' => '#ca8a04',
            'primary_darker' => '#a16207',
            'range_bg' => '#fef9c3',
            'range_text' => '#854d0e',
            'range_bg_dark' => 'rgba(234, 179, 8, 0.2)',
            'range_text_dark' => '#facc15',
        ],
        'lime' => [
            'primary' => '#84cc16',
            'primary_dark' => '#65a30d',
            'primary_darker' => '#4d7c0f',
            'range_bg' => '#ecfccb',
            'range_text' => '#3f6212',
            'range_bg_dark' => 'rgba(132, 204, 22, 0.2)',
            'range_text_dark' => '#a3e635',
        ],
        'green' => [
            'primary' => '#22c55e',
            'primary_dark' => '#16a34a',
            'primary_darker' => '#15803d',
            'range_bg' => '#dcfce7',
            'range_text' => '#166534',
            'range_bg_dark' => 'rgba(34, 197, 94, 0.2)',
            'range_text_dark' => '#4ade80',
        ],
        'emerald' => [
            'primary' => '#10b981',
            'primary_dark' => '#059669',
            'primary_darker' => '#047857',
            'range_bg' => '#d1fae5',
            'range_text' => '#065f46',
            'range_bg_dark' => 'rgba(16, 185, 129, 0.2)',
            'range_text_dark' => '#34d399',
        ],
        'teal' => [
            'primary' => '#14b8a6',
            'primary_dark' => '#0d9488',
            'primary_darker' => '#0f766e',
            'range_bg' => '#ccfbf1',
            'range_text' => '#115e59',
            'range_bg_dark' => 'rgba(20, 184, 166, 0.2)',
            'range_text_dark' => '#2dd4bf',
        ],
        'cyan' => [
            'primary' => '#06b6d4',
            'primary_dark' => '#0891b2',
            'primary_darker' => '#0e7490',
            'range_bg' => '#cffafe',
            'range_text' => '#155e75',
            'range_bg_dark' => 'rgba(6, 182, 212, 0.2)',
            'range_text_dark' => '#22d3ee',
        ],
        'sky' => [
            'primary' => '#0ea5e9',
            'primary_dark' => '#0284c7',
            'primary_darker' => '#0369a1',
            'range_bg' => '#e0f2fe',
            'range_text' => '#075985',
            'range_bg_dark' => 'rgba(14, 165, 233, 0.2)',
            'range_text_dark' => '#38bdf8',
        ],
        'blue' => [
            'primary' => '#3b82f6',
            'primary_dark' => '#2563eb',
            'primary_darker' => '#1d4ed8',
            'range_bg' => '#dbeafe',
            'range_text' => '#1e40af',
            'range_bg_dark' => 'rgba(59, 130, 246, 0.2)',
            'range_text_dark' => '#60a5fa',
        ],
        'indigo' => [
            'primary' => '#6366f1',
            'primary_dark' => '#4f46e5',
            'primary_darker' => '#4338ca',
            'range_bg' => '#e0e7ff',
            'range_text' => '#3730a3',
            'range_bg_dark' => 'rgba(99, 102, 241, 0.2)',
            'range_text_dark' => '#818cf8',
        ],
        'violet' => [
            'primary' => '#8b5cf6',
            'primary_dark' => '#7c3aed',
            'primary_darker' => '#6d28d9',
            'range_bg' => '#ede9fe',
            'range_text' => '#5b21b6',
            'range_bg_dark' => 'rgba(139, 92, 246, 0.2)',
            'range_text_dark' => '#a78bfa',
        ],
        'purple' => [
            'primary' => '#a855f7',
            'primary_dark' => '#9333ea',
            'primary_darker' => '#7e22ce',
            'range_bg' => '#f3e8ff',
            'range_text' => '#6b21a8',
            'range_bg_dark' => 'rgba(168, 85, 247, 0.2)',
            'range_text_dark' => '#c084fc',
        ],
        'fuchsia' => [
            'primary' => '#d946ef',
            'primary_dark' => '#c026d3',
            'primary_darker' => '#a21caf',
            'range_bg' => '#fae8ff',
            'range_text' => '#86198f',
            'range_bg_dark' => 'rgba(217, 70, 239, 0.2)',
            'range_text_dark' => '#e879f9',
        ],
        'pink' => [
            'primary' => '#ec4899',
            'primary_dark' => '#db2777',
            'primary_darker' => '#be185d',
            'range_bg' => '#fce7f3',
            'range_text' => '#9d174d',
            'range_bg_dark' => 'rgba(236, 72, 153, 0.2)',
            'range_text_dark' => '#f472b6',
        ],
        'rose' => [
            'primary' => '#f43f5e',
            'primary_dark' => '#e11d48',
            'primary_darker' => '#be123c',
            'range_bg' => '#ffe4e6',
            'range_text' => '#9f1239',
            'range_bg_dark' => 'rgba(244, 63, 94, 0.2)',
            'range_text_dark' => '#fb7185',
        ],
    ];

    $colors = $themes[$theme] ?? $themes['amber'];
@endphp

<link rel="stylesheet"
    href="{{ $cdn['daterangepicker_css'] ?? 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css' }}" />
<style>
    /* Premium DateRangePicker Styles - Theme: {{ $theme }}
    */ .daterangepicker {
        font-family: inherit;
        border-radius: 20px;
        border: none;
        box-shadow:
            0 25px 50px -12px rgba(0, 0, 0, 0.15),
            0 12px 24px -8px rgba(0, 0, 0, 0.1),
            0 0 0 1px rgba(0, 0, 0, 0.03);
        padding: 0;
        margin-top: 12px;
        z-index: 9999;
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.98);
        overflow: hidden;
    }

    .daterangepicker::before,
    .daterangepicker::after {
        display: none;
    }

    /* Ranges (Sol Panel) */
    .daterangepicker .ranges {
        padding: 20px 16px;
        border-right: 1px solid rgba(0, 0, 0, 0.06);
        background: linear-gradient(180deg, #fafafa 0%, #f5f5f5 100%);
        border-radius: 20px 0 0 20px;
        min-width: 160px;
    }

    .daterangepicker .ranges ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .daterangepicker .ranges li {
        padding: 12px 18px;
        cursor: pointer;
        border-radius: 50px;
        margin-bottom: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #4b5563;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        letter-spacing: -0.01em;
    }

    .daterangepicker .ranges li:hover {
        background-color: rgba(0, 0, 0, 0.04);
        color: #111827;
        transform: translateX(4px);
    }

    .daterangepicker .ranges li.active {
        background: linear-gradient(135deg,
                {{ $colors['primary'] }}
                0%,
                {{ $colors['primary_dark'] }}
                100%);
        color: white;
        box-shadow:
            0 8px 16px -4px
            {{ $colors['primary'] }}
            50,
            0 4px 6px -2px
            {{ $colors['primary'] }}
            30;
        transform: scale(1.02);
    }

    /* Calendar Container */
    .daterangepicker .drp-calendar {
        padding: 20px 24px;
        max-width: none;
        background: white;
    }

    .daterangepicker .drp-calendar.left {
        border-right: 1px solid rgba(0, 0, 0, 0.04);
    }

    /* Month/Year Header */
    .daterangepicker .calendar-table .month {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        padding: 8px 0 20px 0;
        letter-spacing: -0.02em;
    }

    .daterangepicker .calendar-table .prev,
    .daterangepicker .calendar-table .next {
        color:
            {{ $colors['primary'] }}
            !important;
        border-radius: 8px;
        padding: 4px 8px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .daterangepicker .calendar-table .prev span,
    .daterangepicker .calendar-table .next span {
        padding: 6px;
        border-color:
            {{ $colors['primary'] }}
            !important;
    }

    .daterangepicker .calendar-table .prev:hover,
    .daterangepicker .calendar-table .next:hover {
        background-color: transparent;
        color:
            {{ $colors['primary_dark'] }}
            !important;
    }

    .daterangepicker .calendar-table .prev:hover span,
    .daterangepicker .calendar-table .next:hover span {
        border-color:
            {{ $colors['primary_dark'] }}
            !important;
    }

    /* Dropdowns */
    .daterangepicker select.monthselect,
    .daterangepicker select.yearselect {
        font-size: 13px;
        font-weight: 700;
        padding: 8px 32px 8px 14px;
        border-radius: 12px;
        border: 2px solid #e5e7eb;
        background: white;
        color: #111827;
        cursor: pointer;
        transition: all 0.2s ease;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 12px;
    }

    .daterangepicker select.monthselect:hover,
    .daterangepicker select.yearselect:hover {
        border-color:
            {{ $colors['primary'] }}
        ;
        background-color:
            {{ $colors['primary'] }}
            08;
    }

    .daterangepicker select.monthselect:focus,
    .daterangepicker select.yearselect:focus {
        outline: none;
        border-color:
            {{ $colors['primary'] }}
        ;
        box-shadow: 0 0 0 4px
            {{ $colors['primary'] }}
            20;
    }

    .daterangepicker select.monthselect option,
    .daterangepicker select.yearselect option {
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 500;
        background-color: white;
        color: #374151;
    }

    .daterangepicker select.monthselect option:hover,
    .daterangepicker select.yearselect option:hover,
    .daterangepicker select.monthselect option:focus,
    .daterangepicker select.yearselect option:focus {
        background-color:
            {{ $colors['range_bg'] }}
        ;
        color:
            {{ $colors['range_text'] }}
        ;
    }

    .daterangepicker select.monthselect option:checked,
    .daterangepicker select.yearselect option:checked {
        background-color:
            {{ $colors['primary'] }}
            !important;
        color: white !important;
        font-weight: 700;
    }

    /* Week Days Header */
    .daterangepicker .calendar-table th {
        font-size: 11px;
        font-weight: 700;
        color: #9ca3af;
        text-transform: uppercase;
        padding: 12px 0;
        min-width: 42px;
        height: 36px;
        letter-spacing: 0.05em;
    }

    /* Calendar Days */
    .daterangepicker .calendar-table td {
        min-width: 42px;
        height: 42px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 50%;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .daterangepicker td.available:hover {
        background-color:
            {{ $colors['primary'] }}
            15 !important;
        color:
            {{ $colors['primary'] }}
            !important;
        transform: scale(1.1);
    }

    .daterangepicker td.off,
    .daterangepicker td.off.in-range {
        color: #d1d5db;
        background: transparent !important;
    }

    /* Selected Range */
    .daterangepicker td.in-range {
        background-color:
            {{ $colors['range_bg'] }}
            !important;
        color:
            {{ $colors['range_text'] }}
            !important;
        border-radius: 0 !important;
    }

    .daterangepicker td.start-date {
        background: linear-gradient(135deg,
                {{ $colors['primary'] }}
                0%,
                {{ $colors['primary_dark'] }}
                100%) !important;
        color: white !important;
        border-radius: 50% 0 0 50% !important;
        box-shadow: 0 4px 12px -2px
            {{ $colors['primary'] }}
            50;
        transform: scale(1.05);
    }

    .daterangepicker td.end-date {
        background: linear-gradient(135deg,
                {{ $colors['primary'] }}
                0%,
                {{ $colors['primary_dark'] }}
                100%) !important;
        color: white !important;
        border-radius: 0 50% 50% 0 !important;
        box-shadow: 0 4px 12px -2px
            {{ $colors['primary'] }}
            50;
        transform: scale(1.05);
    }

    .daterangepicker td.active,
    .daterangepicker td.active:hover {
        background: linear-gradient(135deg,
                {{ $colors['primary'] }}
                0%,
                {{ $colors['primary_dark'] }}
                100%) !important;
        color: white !important;
    }

    /* Today */
    .daterangepicker td.today {
        font-weight: 800;
        position: relative;
    }

    .daterangepicker td.today::after {
        content: "";
        position: absolute;
        bottom: 4px;
        left: 50%;
        transform: translateX(-50%);
        width: 5px;
        height: 5px;
        background:
            {{ $colors['primary'] }}
        ;
        border-radius: 50%;
    }

    /* Bottom Buttons */
    .daterangepicker .drp-buttons {
        padding: 16px 24px;
        border-top: 1px solid rgba(0, 0, 0, 0.04);
        background: linear-gradient(180deg, #fafafa 0%, #f5f5f5 100%);
        border-radius: 0 0 20px 20px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
    }

    .daterangepicker .drp-selected {
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
        margin-right: auto;
        letter-spacing: -0.01em;
    }

    .daterangepicker .drp-buttons .btn {
        font-size: 13px;
        font-weight: 700;
        padding: 12px 24px;
        border-radius: 50px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        letter-spacing: -0.01em;
    }

    .daterangepicker .drp-buttons .cancelBtn {
        background: white;
        border: 2px solid #e5e7eb;
        color: #4b5563;
    }

    .daterangepicker .drp-buttons .cancelBtn:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        transform: translateY(-2px);
    }

    .daterangepicker .drp-buttons .applyBtn {
        background: linear-gradient(135deg,
                {{ $colors['primary'] }}
                0%,
                {{ $colors['primary_dark'] }}
                100%);
        border: none;
        color: white;
        box-shadow:
            0 8px 16px -4px
            {{ $colors['primary'] }}
            50,
            0 4px 6px -2px
            {{ $colors['primary'] }}
            30;
    }

    .daterangepicker .drp-buttons .applyBtn:hover {
        background: linear-gradient(135deg,
                {{ $colors['primary_dark'] }}
                0%,
                {{ $colors['primary_darker'] }}
                100%);
        transform: translateY(-2px) scale(1.02);
        box-shadow:
            0 12px 20px -4px
            {{ $colors['primary'] }}
            60,
            0 6px 10px -2px
            {{ $colors['primary'] }}
            40;
    }

    /* ===== DARK MODE ===== */
    .dark .daterangepicker {
        background-color: #111827;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        border: none;
        outline: none;
    }

    .dark .daterangepicker .calendar-table {
        border-radius: 20px;
        border-bottom-right-radius: 0;
    }

    .dark .daterangepicker .drp-calendar {
        padding: 0px;
    }

    .dark .daterangepicker .ranges {
        background: #111827;
        border-right-color: #374151;
    }

    .dark .daterangepicker .ranges li {
        color: #d1d5db;
    }

    .dark .daterangepicker .ranges li:hover {
        background-color: #374151;
        color: white;
    }

    .dark .daterangepicker .drp-calendar.left {
        border-right-color: #374151;
        border-radius: 20px;
    }

    .dark .daterangepicker .calendar-table {
        background-color: #111827;
    }

    .dark .daterangepicker .calendar-table .month {
        color: white;
    }

    .dark .daterangepicker .calendar-table th {
        color: #6b7280;
    }

    .dark .daterangepicker .calendar-table td {
        color: #e5e7eb;
    }

    .dark .daterangepicker td.available:hover {
        background-color: #374151 !important;
        color: white !important;
    }

    .dark .daterangepicker td.off,
    .dark .daterangepicker td.off.in-range {
        color: #4b5563;
    }

    .dark .daterangepicker td.in-range {
        background-color:
            {{ $colors['range_bg_dark'] }}
            !important;
        color:
            {{ $colors['range_text_dark'] }}
            !important;
    }

    .dark .daterangepicker .calendar-table .prev,
    .dark .daterangepicker .calendar-table .next {
        color:
            {{ $colors['primary'] }}
            !important;
    }

    .dark .daterangepicker .calendar-table .prev span,
    .dark .daterangepicker .calendar-table .next span {
        padding: 6px;
        border-color:
            {{ $colors['primary'] }}
            !important;
    }

    .dark .daterangepicker .calendar-table .prev:hover,
    .dark .daterangepicker .calendar-table .next:hover {
        background-color: transparent;
        color:
            {{ $colors['range_text_dark'] }}
            !important;
    }

    .dark .daterangepicker .calendar-table .prev:hover span,
    .dark .daterangepicker .calendar-table .next:hover span {
        border-color:
            {{ $colors['range_text_dark'] }}
            !important;
    }

    .dark .daterangepicker select.monthselect,
    .dark .daterangepicker select.yearselect {
        background-color: #374151;
        color: white;
        border-color: transparent;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%239ca3af' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    }

    .dark .daterangepicker select.monthselect:hover,
    .dark .daterangepicker select.yearselect:hover {
        border-color:
            {{ $colors['primary'] }}
        ;
        background-color: #4b5563;
    }

    .dark .daterangepicker select.monthselect:focus,
    .dark .daterangepicker select.yearselect:focus {
        border-color:
            {{ $colors['primary'] }}
        ;
        box-shadow: 0 0 0 4px
            {{ $colors['primary'] }}
            30;
    }

    .dark .daterangepicker select.monthselect option,
    .dark .daterangepicker select.yearselect option {
        background: #374151;
        color: #e5e7eb;
    }

    .dark .daterangepicker select.monthselect option:checked,
    .dark .daterangepicker select.yearselect option:checked {
        background:
            {{ $colors['primary'] }}
        ;
        color: white;
    }

    .dark .daterangepicker .drp-buttons {
        background: #111827;
        border-top-color: #374151;
    }

    .dark .daterangepicker .drp-selected {
        color: #9ca3af;
    }

    .dark .daterangepicker .drp-buttons .cancelBtn {
        background: #374151;
        border-color: #4b5563;
        color: #e5e7eb;
    }

    .dark .daterangepicker .drp-buttons .cancelBtn:hover {
        background: #4b5563;
        border-color: #6b7280;
    }

    /* ===== MOBILE RESPONSIVE ===== */
    @media (max-width: 767px) {
        .daterangepicker {
            width: 95vw !important;
            max-width: 360px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            margin-top: 8px !important;
        }

        .daterangepicker .ranges {
            width: 100%;
            border-right: none;
            border-bottom: 1px solid #e5e7eb;
            border-radius: 12px 12px 0 0;
            display: flex;
            flex-wrap: wrap;
            padding: 12px;
            gap: 6px;
        }

        .daterangepicker .ranges ul {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            width: 100%;
        }

        .daterangepicker .ranges li {
            flex: 1 1 calc(50% - 6px);
            text-align: center;
            padding: 8px 10px;
            font-size: 12px;
            margin-bottom: 0;
        }

        .daterangepicker .drp-calendar {
            width: 100% !important;
            max-width: 100% !important;
            padding: 12px;
            float: none !important;
        }

        .daterangepicker .drp-calendar.left {
            border-right: none;
        }

        .daterangepicker .calendar-table th,
        .daterangepicker .calendar-table td {
            min-width: 36px;
            height: 36px;
            font-size: 13px;
        }

        .daterangepicker .drp-buttons {
            padding: 12px;
        }

        .daterangepicker .drp-buttons .btn {
            padding: 10px 16px;
            font-size: 13px;
        }

        .daterangepicker .drp-selected {
            display: none;
        }
    }

    @media (max-width: 400px) {
        .daterangepicker .ranges li {
            flex: 1 1 100%;
        }

        .daterangepicker .calendar-table th,
        .daterangepicker .calendar-table td {
            min-width: 32px;
            height: 32px;
            font-size: 12px;
        }
    }
</style>