<?php

namespace Suleyman\SmartDateFilter;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class SmartDateFilter extends Filter
{
    protected string $column = 'created_at';

    public static function make(?string $name = null): static
    {
        return parent::make($name ?? 'smart_date_filter');
    }

    public function column(string $column): static
    {
        $this->column = $column;
        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->form($this->getFormSchema());

        $this->query(function (Builder $query, array $data): Builder {
            return $query
                ->when(
                    $data['from'] ?? null,
                    fn(Builder $query, string $date) => $query->whereDate($this->column, '>=', $date)
                )
                ->when(
                    $data['to'] ?? null,
                    fn(Builder $query, string $date) => $query->whereDate($this->column, '<=', $date)
                );
        });

        $this->indicateUsing(function (array $data): ?string {
            if (!($data['from'] ?? null) && !($data['to'] ?? null)) {
                return null;
            }

            $from = $data['from'] ? \Carbon\Carbon::parse($data['from'])->format('d/m/Y') : null;
            $to = $data['to'] ? \Carbon\Carbon::parse($data['to'])->format('d/m/Y') : null;

            if ($from && $to) {
                return "Tarih: {$from} - {$to}";
            } elseif ($from) {
                return "Tarih: {$from}'den itibaren";
            } else {
                return "Tarih: {$to}'e kadar";
            }
        });
    }

    public function getFormSchema(): array
    {
        return [
            ViewField::make('daterangepicker')
                ->view('smart-date-filter::daterangepicker')
                ->label('Tarih Aralığı')
                ->hiddenLabel(),

            TextInput::make('from')
                ->hidden(),

            TextInput::make('to')
                ->hidden(),
        ];
    }
}
