<?php

namespace App\Filament\Resources\CustomerQontakResource\Pages;

use App\Filament\Resources\CustomerQontakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerQontak extends EditRecord
{
    protected static string $resource = CustomerQontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
