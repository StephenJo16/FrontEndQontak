<?php

namespace App\Filament\Resources\CustomerBillingResource\Pages;

use App\Filament\Resources\CustomerBillingResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Resources\Pages\ViewRecord;

class ViewCustomerBilling extends ViewRecord
{
    protected static string $resource = CustomerBillingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ccustcode')
                    ->label('Customer ID')
                    ->disabled()
                    ->columnSpanFull(),

                Section::make('Customer Information')
                    ->description('Customer personal and contact details.')
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
                                TextInput::make('ccust2bank')->label('Bank')->disabled(),
                                TextInput::make('ccust2mobile1')->label('Mobile 1')->disabled(),
                                TextInput::make('ccust2mobile2')->label('Mobile 2')->disabled(),
                                TextInput::make('ccust2email1')->label('Alternate Email')->disabled(),
                                TextInput::make('ccust2type')->label('Customer Type')->disabled(),
                            ]),
                        TextInput::make('custaddress')->label('Address')->columnSpanFull()->disabled(),
                        TextInput::make('dcustlastup')->label('Last Updated')->disabled(),
                    ]),

                Section::make('Billing Information')
                    ->description('Billing and transaction details.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('cbillhnumber')->label('Bill Number')->disabled(),
                                TextInput::make('dbillhstartperiod')->label('Start Period')->disabled(),
                                TextInput::make('dbillhdate')->label('Billing Date')->disabled(),
                                TextInput::make('dbillhendperiod')->label('End Period')->disabled(),

                                TextInput::make('fbillhnettvalue')
                                    ->label('Net Value')
                                    ->prefix('IDR ')
                                    ->disabled()
                                    ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.'))
                                    ->columnSpan(1),

                                TextInput::make('fbillhdpp')
                                    ->label('DPP')
                                    ->prefix('IDR ')
                                    ->disabled()
                                    ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.'))
                                    ->columnSpan(1),

                                TextInput::make('fbillhppn')
                                    ->label('PPN')
                                    ->prefix('IDR ')
                                    ->disabled()
                                    ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.'))
                                    ->columnSpan(1),

                                TextInput::make('ccust2vanumber')->label('VA Number')->disabled(),

                                TextInput::make('fbillhtotal')
                                    ->label('Total Bill')
                                    ->prefix('IDR ')
                                    ->disabled()
                                    ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.'))
                                    ->columnSpan(1),
                            ]),
                    ]),
            ]);
    }
}