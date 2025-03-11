<?php

namespace App\Filament\Resources\CustomerBillingResource\Pages;

use App\Filament\Resources\CustomerBillingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerBilling extends CreateRecord
{
    protected static string $resource = CustomerBillingResource::class;
}
