<?php

namespace App\Filament\Resources\BillingQontakResource\Pages;

use App\Filament\Resources\BillingQontakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBillingQontaks extends ListRecords
{
    protected static string $resource = BillingQontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
