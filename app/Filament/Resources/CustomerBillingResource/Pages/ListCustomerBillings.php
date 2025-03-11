<?php

namespace App\Filament\Resources\CustomerBillingResource\Pages;

use App\Filament\Resources\CustomerBillingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomerBillings extends ListRecords
{
    protected static string $resource = CustomerBillingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
