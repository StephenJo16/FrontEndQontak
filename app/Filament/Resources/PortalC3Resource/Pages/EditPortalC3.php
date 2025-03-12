<?php

namespace App\Filament\Resources\PortalC3Resource\Pages;

use App\Filament\Resources\PortalC3Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortalC3 extends EditRecord
{
    protected static string $resource = PortalC3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
