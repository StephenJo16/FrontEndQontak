<?php

namespace App\Filament\Resources\CustomerBillingResource\Pages;

use App\Filament\Resources\CustomerBillingResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;

class ViewCustomerBilling extends ViewRecord
{
    protected static string $resource = CustomerBillingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               TextInput::make('ccustcode')
                    ->label('Customer ID')
                    ->disabled()
                    ->columnSpanFull()
                    ->prefixIcon('heroicon-o-identification'),

                Grid::make(2)
                    ->schema([
                        Section::make('Customer Information')
                            ->description('Customer personal and contact details.')
                            ->collapsible()
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('ccustname')->label('Customer Name')->disabled(),
                                        TextInput::make('ccustphone')->label('Phone')->disabled(),
                                        TextInput::make('ccustemail')->label('Email')->disabled(),
                                        TextInput::make('ccuststatus')->label('Status')->disabled(),
                                        TextInput::make('ccust2loccode')->label('Location Code')->disabled(),
                                        TextInput::make('ccust2vanumber')->label('VA Number')->disabled(),
                                        TextInput::make('ccust2provider')->label('Provider')->disabled(),
                                        TextInput::make('ccust2mobile1')->label('Mobile 1')->disabled(),
                                        TextInput::make('ccust2type')->label('Customer Type')->disabled(),
                                    ]),
                                TextInput::make('custaddress')->label('Address')->columnSpanFull()->disabled(),
                                TextInput::make('dcustlastup')->label('Last Updated')->disabled(),
                            ])
                            ->columnSpan(1),

                        Section::make('Payment Details')
                            ->description('Additional payment-related information.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('payment_status')->label('Payment Status')->disabled(),
                                TextInput::make('payment_due_date')->label('Due Date')->disabled(),
                                TextInput::make('payment_method')->label('Payment Method')->disabled(),
                            ])
                            ->columnSpan(1),
                    ]),

                Section::make('Billing Information')
                    ->description('Billing and transaction details.')
                    ->collapsible()
                    ->schema([
                        Section::make('Billing 1')
                            ->collapsible()
                            ->schema([
                                Grid::make(5)
                                    ->schema([
                                        TextInput::make('cbillhnumber')->label('Bill Number')->disabled(),
                                        TextInput::make('dbillhdate')->label('Billing Date')->disabled(),
                                        TextInput::make('ccust2vanumber')->label('VA Number')->disabled(),
                                        TextInput::make('fbillhnettvalue')
                                            ->label('Net Value')
                                            ->prefix('IDR ')
                                            ->disabled()
                                            ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.')),
                                        TextInput::make('fbillhtotal')
                                            ->label('Total Bill')
                                            ->prefix('IDR ')
                                            ->disabled()
                                            ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.')),
                                    ]),
                            ]),

                        Section::make('Billing 2')
                            ->collapsible()
                            ->schema([
                                Grid::make(5)
                                    ->schema([
                                        TextInput::make('cbillhnumber')->label('Bill Number')->disabled(),
                                        TextInput::make('dbillhdate')->label('Billing Date')->disabled(),
                                        TextInput::make('ccust2vanumber')->label('VA Number')->disabled(),
                                        TextInput::make('fbillhnettvalue')
                                            ->label('Net Value')
                                            ->prefix('IDR ')
                                            ->disabled(),
                                        TextInput::make('fbillhtotal')
                                            ->label('Total Bill')
                                            ->prefix('IDR ')
                                            ->disabled(),
                                    ]),
                            ]),
                        Section::make('Billing 3')
                        ->collapsible()
                        ->schema([
                             Grid::make(5)
                                ->schema([
                                    TextInput::make('cbillhnumber')->label('Bill Number')->disabled(),
                                    TextInput::make('dbillhdate')->label('Billing Date')->disabled(),
                                    TextInput::make('ccust2vanumber')->label('VA Number')->disabled(),
                                    TextInput::make('fbillhnettvalue')
                                        ->label('Net Value')
                                        ->prefix('IDR ')
                                        ->disabled(),
                                    TextInput::make('fbillhtotal')
                                        ->label('Total Bill')
                                        ->prefix('IDR ')
                                        ->disabled(),
                                ]),
                        ]),
                    ]),

                Grid::make(2)
                    ->schema([
                        Section::make('Additional Information')
                            ->description('Miscellaneous details about the customer or billing.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('additional_notes')->label('Notes')->disabled(),
                                TextInput::make('reference_number')->label('Reference Number')->disabled(),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }
}