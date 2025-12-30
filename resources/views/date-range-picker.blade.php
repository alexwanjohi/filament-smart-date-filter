<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="smartDatePicker{{ $getId() }}()"
        x-init="$nextTick(() => init())"
        class="relative"
    >
        <input
            type="text"
            x-ref="input"
            @click="open = !open"
            readonly
            placeholder="Select date range"
            class="block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm cursor-pointer"
        />

        <div x-show="open"
             x-cloak
             @click.away="open = false"
             style="display: none;"
             class="absolute z-50 mt-2 bg-white dark:bg-gray-800 rounded-lg shadow-xl border flex overflow-hidden">

            <!-- Sol: Presets -->
            <div class="border-r p-3 space-y-1 min-w-[140px] bg-gray-50 dark:bg-gray-900">
                <button @click="applyPreset('today')" type="button"
                        class="block w-full text-left px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-sm whitespace-nowrap">
                    Today
                </button>
                <button @click="applyPreset('yesterday')" type="button"
                        class="block w-full text-left px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-sm whitespace-nowrap">
                    Yesterday
                </button>
                <button @click="applyPreset('last_7_days')" type="button"
                        class="block w-full text-left px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-sm whitespace-nowrap">
                    Last 7 Days
                </button>
            </div>

            <!-- Sağ: Calendar -->
            <div x-ref="flatpickr"></div>
        </div>
    </div>
</x-dynamic-component>

@once
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endonce

@push('scripts')
    @once
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @endonce
    <script>
        function smartDatePicker{{ $getId() }}() {
            return {
                open: false,
                picker: null,

                init() {
                    setTimeout(() => {
                        if (typeof flatpickr === 'undefined') {
                            console.error('Flatpickr not loaded');
                            return;
                        }

                        this.picker = flatpickr(this.$refs.flatpickr, {
                            mode: 'range',
                            inline: true,
                            showMonths: 2,
                            dateFormat: 'd/m/Y'
                        });
                    }, 100);
                },

                applyPreset(preset) {
                    const today = new Date();
                    let from, to;

                    switch(preset) {
                        case 'today':
                            from = to = today;
                            break;
                        case 'yesterday':
                            const yesterday = new Date();
                            yesterday.setDate(yesterday.getDate() - 1);
                            from = to = yesterday;
                            break;
                        case 'last_7_days':
                            const weekAgo = new Date();
                            weekAgo.setDate(weekAgo.getDate() - 7);
                            from = weekAgo;
                            to = today;
                            break;
                    }

                    this.picker.setDate([from, to]);
                }
            }
        }
    </script>
@endpush
