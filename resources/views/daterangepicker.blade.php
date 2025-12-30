<div class="w-full" wire:ignore>
    <label style="display: block; font-size: 14px; font-weight: 500; color: #374151; margin-bottom: 6px;">
        <span x-text="window.SmartDateFilterConfig?.translations?.label || 'Tarih'">Tarih</span>
    </label>
    <div x-data="{
            picker: null,
            config: window.SmartDateFilterConfig || {},
            isMobile: window.innerWidth < 768,
            init() {
                const self = this;
                const input = this.$refs.dateInput;
                const config = this.config;
                const t = config.translations || {};

                // Ekran boyutu değişikliğini dinle
                window.addEventListener('resize', () => {
                    self.isMobile = window.innerWidth < 768;
                    self.updateCalendarMode();
                });

                const initPicker = () => {
                    if (typeof $ === 'undefined' || typeof $.fn.daterangepicker === 'undefined') {
                        setTimeout(initPicker, 100);
                        return;
                    }

                    const ranges = {};
                    if (config.showRanges !== false) {
                        ranges[t.today || 'Bugün'] = [moment(), moment()];
                        ranges[t.yesterday || 'Dün'] = [moment().subtract(1, 'days'), moment().subtract(1, 'days')];
                        ranges[t.last_7_days || 'Son 7 Gün'] = [moment().subtract(6, 'days'), moment()];
                        ranges[t.last_30_days || 'Son 30 Gün'] = [moment().subtract(29, 'days'), moment()];
                        ranges[t.this_month || 'Bu Ay'] = [moment().startOf('month'), moment().endOf('month')];
                        ranges[t.last_month || 'Geçen Ay'] = [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')];
                        ranges[t.this_year || 'Bu Yıl'] = [moment().startOf('year'), moment().endOf('year')];
                        ranges[t.last_year || 'Geçen Yıl'] = [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')];
                    }

                    // Tek takvim modu hesapla
                    const singleCalendarSetting = config.singleCalendar;
                    let useSingleCalendar = false;

                    if (singleCalendarSetting === 'auto') {
                        useSingleCalendar = self.isMobile;
                    } else if (singleCalendarSetting === 'true' || singleCalendarSetting === true) {
                        useSingleCalendar = true;
                    }

                    $(input).daterangepicker({
                        opens: 'left',
                        drops: 'auto',
                        autoUpdateInput: false,
                        showDropdowns: true,
                        linkedCalendars: !useSingleCalendar,
                        alwaysShowCalendars: true,
                        singleDatePicker: false,
                        ranges: config.showRanges !== false ? ranges : undefined,
                        locale: {
                            format: config.format || 'DD/MM/YYYY',
                            separator: ' - ',
                            applyLabel: t.apply || 'Uygula',
                            cancelLabel: t.cancel || 'İptal',
                            fromLabel: t.from || 'Başlangıç',
                            toLabel: t.to || 'Bitiş',
                            customRangeLabel: t.custom || 'Özel',
                            weekLabel: t.week || 'H',
                            daysOfWeek: t.days || ['Pz', 'Pt', 'Sa', 'Ça', 'Pe', 'Cu', 'Ct'],
                            monthNames: t.months || ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                            firstDay: config.firstDay || 1
                        }
                    });

                    self.picker = $(input).data('daterangepicker');

                    // Başlangıçta takvim modunu ayarla
                    self.updateCalendarMode();

                    $(input).on('show.daterangepicker', function() {
                        self.updateCalendarMode();
                    });

                    $(input).on('apply.daterangepicker', function(ev, picker) {
                        const format = config.format || 'DD/MM/YYYY';
                        const startDate = picker.startDate.format(format);
                        const endDate = picker.endDate.format(format);
                        $(this).val(startDate + ' - ' + endDate);

                        $wire.set('tableFilters.smart_date_filter.from', picker.startDate.format('YYYY-MM-DD'));
                        $wire.set('tableFilters.smart_date_filter.to', picker.endDate.format('YYYY-MM-DD'));
                    });

                    $(input).on('cancel.daterangepicker', function(ev, picker) {
                        $(this).val('');
                        $wire.set('tableFilters.smart_date_filter.from', null);
                        $wire.set('tableFilters.smart_date_filter.to', null);
                    });

                    const currentFrom = $wire.get('tableFilters.smart_date_filter.from');
                    const currentTo = $wire.get('tableFilters.smart_date_filter.to');

                    if (currentFrom && currentTo) {
                        const format = config.format || 'DD/MM/YYYY';
                        const startDate = moment(currentFrom).format(format);
                        const endDate = moment(currentTo).format(format);
                        $(input).val(startDate + ' - ' + endDate);
                        self.picker.setStartDate(moment(currentFrom));
                        self.picker.setEndDate(moment(currentTo));
                    }
                };

                initPicker();
            },
            updateCalendarMode() {
                const singleCalendarSetting = this.config.singleCalendar;
                let useSingleCalendar = false;

                if (singleCalendarSetting === 'auto') {
                    useSingleCalendar = this.isMobile;
                } else if (singleCalendarSetting === 'true' || singleCalendarSetting === true) {
                    useSingleCalendar = true;
                }

                if (useSingleCalendar) {
                    $('.daterangepicker .drp-calendar.right').hide();
                    $('.daterangepicker .drp-calendar.left').css('border-right', 'none');
                } else {
                    $('.daterangepicker .drp-calendar.right').show();
                    $('.daterangepicker .drp-calendar.left').css('border-right', '1px solid #f3f4f6');
                }
            }
        }" x-init="init()" style="position: relative; display: flex; align-items: center;">
        <input type="text" x-ref="dateInput" readonly
            x-bind:placeholder="config.translations?.placeholder || 'Tarih aralığı seçin...'"
            x-bind:style="'width: 100%; padding: 10px 44px 10px 12px; border: 1px solid #e5e7eb; border-radius: 8px; background: white; cursor: pointer; font-size: 14px; color: #374151; outline: none; transition: border-color 0.15s, box-shadow 0.15s;'"
            @focus="$el.style.borderColor = config.primaryColor || '#f59e0b'; $el.style.boxShadow = '0 0 0 3px ' + (config.primaryColor || '#f59e0b') + '1a';"
            @blur="$el.style.borderColor = '#e5e7eb'; $el.style.boxShadow = 'none';" />
        <div
            x-bind:style="'position: absolute; right: 12px; top: 50%; transform: translateY(-50%); pointer-events: none;'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                x-bind:fill="config.primaryColor || '#f59e0b'">
                <path
                    d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11zM9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm-8 4H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2z" />
            </svg>
        </div>
    </div>
</div>