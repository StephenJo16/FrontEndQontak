<?php

namespace App\Filament\Resources\CustomerQontakResource\Pages;

use App\Filament\Resources\CustomerQontakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomerQontaks extends ListRecords
{
    protected static string $resource = CustomerQontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
