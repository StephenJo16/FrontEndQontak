<?php

namespace App\Filament\Resources\CustomerBillingResource\Pages;

use App\Filament\Resources\CustomerBillingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerBilling extends EditRecord
{
    protected static string $resource = CustomerBillingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
