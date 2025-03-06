<?php

namespace App\Filament\Resources\BillingQontakResource\Pages;

use App\Filament\Resources\BillingQontakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBillingQontak extends EditRecord
{
    protected static string $resource = BillingQontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
