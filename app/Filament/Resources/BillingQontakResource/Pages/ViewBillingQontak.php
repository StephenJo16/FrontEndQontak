<?php

namespace App\Filament\Resources\BillingQontakResource\Pages;

use App\Filament\Resources\BillingQontakResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;

class ViewBillingQontak extends ViewRecord
{
    protected static string $resource = BillingQontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
           
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('cbillhnumber')
                        ->label('Bill Number')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('cbillhcustomerbillcd')
                        ->label('Customer ID')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('dbillhstartperiod')
                        ->label('Start Period')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('dbillhendperiod')
                        ->label('End Period')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('dbillhdate')
                        ->label('Billing Date')
                        ->disabled()
                        ->columnSpan(1),

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

                    TextInput::make('ccust2vanumber')
                        ->label('VA Number')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('fbillhtotal')
                        ->label('Total Bill')
                        ->prefix('IDR ')
                        ->disabled()
                        ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.'))
                        ->columnSpan(1),

                ]),
            ]);
    }
} ?>