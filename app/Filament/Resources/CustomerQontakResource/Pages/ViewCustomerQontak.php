<?php

namespace App\Filament\Resources\CustomerQontakResource\Pages;

use App\Filament\Resources\CustomerQontakResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;

class ViewCustomerQontak extends ViewRecord
{
    protected static string $resource = CustomerQontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)->schema([
                TextInput::make('ccustcode')->label('Customer Code')->disabled(),
                TextInput::make('ccustname')->label('Customer Name')->disabled(),
                Textarea::make('custaddress')->label('Address')->disabled(),
                TextInput::make('ccustemail')->label('Email')->disabled(),
                TextInput::make('ccustphone')->label('Phone')->disabled(),
                TextInput::make('ccust2vanumber')->label('VA Number')->disabled(),
                TextInput::make('ccust2provider')->label('Provider')->disabled(),
                TextInput::make('ccust2bank')->label('Bank')->disabled(),
                TextInput::make('ccust2mobile1')->label('Mobile 1')->disabled(),
                TextInput::make('ccust2mobile2')->label('Mobile 2')->disabled(),
                TextInput::make('ccust2email1')->label('Email 1')->disabled(),
                TextInput::make('ccust2type')->label('Customer Type')->disabled(),
                TextInput::make('ccuststatus')->label('Status')->disabled(),
                TextInput::make('dcustlastup')->label('Last Update')->disabled(),
            ]),
        ];
    }
}