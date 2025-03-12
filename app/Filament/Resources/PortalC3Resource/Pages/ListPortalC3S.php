<?php

namespace App\Filament\Resources\PortalC3Resource\Pages;

use App\Filament\Resources\PortalC3Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortalC3S extends ListRecords
{
    protected static string $resource = PortalC3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
          
        ];
    }
}