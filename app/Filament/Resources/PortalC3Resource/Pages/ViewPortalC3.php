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
        return $form
            ->schema([
                TextInput::make('ccustomer_id')
                    ->label('Customer ID')
                    ->disabled()
                    ->columnSpanFull()
                    ->prefixIcon('heroicon-o-identification'),

                Grid::make(2)
                    ->schema([
                        // Customer Section
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
                                        TextInput::make('ccust2type')->label('Customer Type')->disabled(),
                                        TextInput::make('ccust2mobile1')->label('Mobile 1')->disabled(),
                                        TextInput::make('ccust2mobile2')->label('Mobile 2')->disabled(),
                                    ]),
                                TextInput::make('custaddress')->label('Address')->columnSpanFull()->disabled(),
                                TextInput::make('dcustlastup')->label('Last Updated')->disabled(),
                            ])
                            ->columnSpan(1),

                        // Odoo Section
                        Section::make('Odoo Information')
                            ->description('Odoo related details.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('odoo_id')->label('Odoo ID')->disabled(),
                                TextInput::make('odoo_name')->label('Odoo Name')->disabled(),
                                TextInput::make('odoo_amount_total')
                                    ->label('Total Amount')
                                    ->prefix('IDR ')
                                    ->disabled()
                                    ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.')),
                                TextInput::make('odoo_service_type')->label('Service Type')->disabled(),
                                TextInput::make('partner_name')->label('Partner Name')->disabled(),
                                TextInput::make('partner_email')->label('Partner Email')->disabled(),
                                TextInput::make('street')->label('Street')->disabled(),
                                TextInput::make('blok')->label('Block')->disabled(),
                                TextInput::make('number')->label('Number')->disabled(),
                                TextInput::make('odoo_active')
                                    ->label('Odoo Active')
                                    ->disabled()
                                    ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No'),
                            ])
                            ->columnSpan(1)
                    ]),

                // Billing Information
                Section::make('Billing Information')
                    ->description('Billing and transaction details.')
                    ->collapsible()
                    ->schema([
                        ...array_map(fn ($index) => Section::make("Billing " . ($index + 1))
                            ->collapsible()
                            ->schema([
                                Grid::make(5)
                                    ->schema([
                                        TextInput::make("cbillhnumbers.{$index}")->label('Bill Number')->disabled(),
                                        TextInput::make("dbillhdates.{$index}")->label('Billing Date')->disabled(),
                                        TextInput::make('ccust2vanumber')->label('VA Number')->disabled(),
                                        TextInput::make("fbillhnettvalues.{$index}")
                                            ->label('Net Value')
                                            ->prefix('IDR ')
                                            ->disabled()
                                            ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.')),
                                        TextInput::make("fbillhdpps.{$index}")
                                            ->label('DPP')
                                            ->prefix('IDR ')
                                            ->disabled()
                                            ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.')),
                                        TextInput::make("fbillhppns.{$index}")
                                            ->label('PPN')
                                            ->prefix('IDR ')
                                            ->disabled()
                                            ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.')),
                                        TextInput::make("fbillhtotals.{$index}")
                                            ->label('Total Bill')
                                            ->prefix('IDR ')
                                            ->disabled()
                                            ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.')),
                                    ]),
                            ]), range(0, 2)), 
                    ]),
            ]);
    }
}