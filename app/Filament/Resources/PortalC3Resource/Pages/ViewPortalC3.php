<?php

namespace App\Filament\Resources\PortalC3Resource\Pages;

use App\Filament\Resources\PortalC3Resource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class ViewPortalC3 extends ViewRecord
{
    protected static string $resource = PortalC3Resource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function form(Form $form): Form
    {
        $trim = fn($state) => trim((string) $state);

        return $form
            ->schema([
                TextInput::make('ccustomer_id')
                    ->label('Customer ID')
                    ->disabled()
                    ->columnSpanFull()
                    ->prefixIcon('heroicon-o-identification')
                    ->formatStateUsing($trim),

                Grid::make(2)
                    ->schema([
                        Section::make('Customer Information')
                            ->description('Customer personal and contact details.')
                            ->collapsible()
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('ccustname')->label('Customer Name')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccustphone')->label('Phone')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccustemail')->label('Email')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccuststatus')->label('Status')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccust2loccode')->label('Location Code')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccust2vanumber')->label('VA Number')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccust2provider')->label('Provider')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccust2type')->label('Customer Type')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccust2mobile1')->label('Mobile 1')->disabled()->formatStateUsing($trim),
                                        TextInput::make('ccust2mobile2')->label('Mobile 2')->disabled()->formatStateUsing($trim),
                                    ]),
                                TextInput::make('custaddress')->label('Address')->columnSpanFull()->disabled()->formatStateUsing($trim),
                                TextInput::make('dcustlastup')->label('Last Updated')->disabled()->formatStateUsing($trim),
                            ])
                            ->columnSpan(1),

                        Section::make('Odoo Information')
                            ->description('Odoo related details.')
                            ->collapsible()
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('odoo_id')->label('Odoo ID')->disabled()->formatStateUsing($trim),
                                        TextInput::make('odoo_name')->label('Odoo Name')->disabled()->formatStateUsing($trim),
                                        TextInput::make('odoo_amount_total')
                                            ->label('Total Amount')
                                            ->prefix('IDR ')
                                            ->disabled()
                                            ->formatStateUsing(fn ($state) => 'IDR ' . number_format((float) $trim($state), 2, ',', '.')),
                                        TextInput::make('odoo_service_type')->label('Service Type')->disabled()->formatStateUsing($trim),
                                        TextInput::make('partner_name')->label('Partner Name')->disabled()->columnSpanFull()->formatStateUsing($trim),
                                        TextInput::make('partner_email')->label('Partner Email')->disabled()->columnSpanFull()->formatStateUsing($trim),
                                        TextInput::make('street')->label('Street')->disabled()->columnSpanFull()->formatStateUsing($trim),
                                        TextInput::make('blok')->label('Block')->disabled()->formatStateUsing($trim),
                                        TextInput::make('number')->label('Number')->disabled()->formatStateUsing($trim),
                                        TextInput::make('odoo_active')
                                            ->label('Odoo Active')
                                            ->disabled()
                                            ->formatStateUsing(fn ($state) => $trim($state) ? 'Yes' : 'No')
                                            ->columnSpanFull(),
                                    ]),
                            ])
                            ->columnSpan(1),
                    ]),

                Section::make('Billing Information')
                    ->description('Billing and transaction details.')
                    ->collapsible()
                    ->schema(
                        function () use ($trim) {
                            $ensureArray = function ($data) {
                                if (is_array($data)) {
                                    return $data;
                                }

                                if (is_string($data)) {
                                    $decoded = json_decode($data, true);
                                    if (json_last_error() === JSON_ERROR_NONE) {
                                        return $decoded;
                                    }

                                    $data = trim($data, '{}');
                                    return explode(',', $data);
                                }

                                return [];
                            };

                            $billingNumbers = $ensureArray(data_get($this->record, 'cbillhnumbers'));
                            $billingDates = $ensureArray(data_get($this->record, 'dbillhdates'));
                            $netValues = $ensureArray(data_get($this->record, 'fbillhnettvalues'));
                            $dppValues = $ensureArray(data_get($this->record, 'fbillhdpps'));
                            $ppnValues = $ensureArray(data_get($this->record, 'fbillhppns'));
                            $totalBills = $ensureArray(data_get($this->record, 'fbillhtotals'));

                            $maxSections = max(
                                count($billingNumbers),
                                count($billingDates),
                                count($netValues),
                                count($dppValues),
                                count($ppnValues),
                                count($totalBills)
                            );

                            if ($maxSections === 0) {
                                return [
                                    Section::make('No Billing Information')
                                    ->collapsible()
                                    ->schema([
                                        TextInput::make('no_billing')->label('Note')->disabled()->placeholder('No billing data available.'),
                                    ])
                                ];
                            }

                            return collect(range(0, $maxSections - 1))->map(
                                function ($index) use ($billingNumbers, $billingDates, $netValues, $dppValues, $ppnValues, $totalBills, $trim) {
                                    $monthYear = date('F - Y', strtotime($billingDates[$index] ?? 'now'));
                                    return Section::make("Billing $monthYear")
                                        ->collapsible()
                                        ->schema([
                                            Grid::make(6)
                                                ->schema([
                                                    TextInput::make("cbillhnumbers.{$index}")
                                                        ->label('Bill Number')
                                                        ->disabled()
                                                        ->formatStateUsing(fn () => trim($billingNumbers[$index] ?? 'N/A', ' "')),

                                                    TextInput::make("dbillhdates.{$index}")
                                                        ->label('Billing Date')
                                                        ->disabled()
                                                        ->formatStateUsing(fn () => $trim($billingDates[$index] ?? 'N/A')),

                                                    TextInput::make("fbillhnettvalues.{$index}")
                                                        ->label('Net Value')
                                                        ->prefix('IDR ')
                                                        ->disabled()
                                                        ->formatStateUsing(fn () => number_format((float) $trim($netValues[$index] ?? 0), 2, ',', '.')),

                                                    TextInput::make("fbillhdpps.{$index}")
                                                        ->label('DPP')
                                                        ->prefix('IDR ')
                                                        ->disabled()
                                                        ->formatStateUsing(fn () => number_format((float) $trim($dppValues[$index] ?? 0), 2, ',', '.')),

                                                    TextInput::make("fbillhppns.{$index}")
                                                        ->label('PPN')
                                                        ->prefix('IDR ')
                                                        ->disabled()
                                                        ->formatStateUsing(fn () => number_format((float) $trim($ppnValues[$index] ?? 0), 2, ',', '.')),

                                                    TextInput::make("fbillhtotals.{$index}")
                                                        ->label('Total Bill')
                                                        ->prefix('IDR ')
                                                        ->disabled()
                                                        ->formatStateUsing(fn () => number_format((float) $trim($totalBills[$index] ?? 0), 2, ',', '.')),
                                                ]),
                                        ]);
                                }
                            )->toArray();
                        }
                    ),
            ]);
    }
}