<?php

namespace App\Filament\Resources\CustomerQontakResource\Pages;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\CustomerQontakResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Infolist;
use Filament\Forms\Form;

class ViewCustomerQontak extends ViewRecord
{
    protected static string $resource = CustomerQontakResource::class;

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
                    TextInput::make('ccustcode')
                        ->label('Customer Code')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccustname')
                        ->label('Customer Name')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('custaddress')
                        ->label('Address')
                        ->disabled()
                        ->columnSpan(1),
                        
                    TextInput::make('ccustemail')
                        ->label('Email')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccustphone')
                        ->label('Phone')
                        ->disabled()
                        ->columnSpan(1),
                        
                    TextInput::make('ccust2vanumber')
                        ->label('VA Number')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccust2provider')
                        ->label('Provider')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccust2bank')
                        ->label('Bank')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccust2mobile1')
                        ->label('Mobile 1')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccust2mobile2')
                        ->label('Mobile 2')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccust2email1')
                        ->label('Email 1')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccust2type')
                        ->label('Customer Type')
                        ->disabled()
                        ->columnSpan(1),

                    TextInput::make('ccuststatus')
                        ->label('Status')
                        ->disabled()
                        ->columnSpan(1),
                    
                    TextInput::make('dcustlastup')
                        ->label('Last Update')
                        ->disabled()
                        ->columnSpan(1),
                ]),
            ]);
    }
}