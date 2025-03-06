<?php

namespace App\Filament\Resources\BillingQontakResource\Pages;

use App\Filament\Resources\BillingQontakResource;
use Filament\Forms;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;

class ViewBillingQontak extends ViewRecord
{
    protected static string $resource = BillingQontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
           
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)->schema([
                TextInput::make('cbillhnumber')->label('Bill Number')->disabled(),
                TextInput::make('cbillhcustomerbillcd')->label('Customer Bill Code')->disabled(),
                DatePicker::make('dbillhdate')->label('Billing Date')->disabled(),
                TextInput::make('fbillhnettvalue')->label('Net Value')->disabled(),
                TextInput::make('fbillhtotal')->label('Total Bill')->disabled(),
                Textarea::make('description')->label('Description')->disabled(),
            ]),
        ];
    }
}