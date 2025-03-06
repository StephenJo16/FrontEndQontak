<?php

namespace App\Filament\Resources\CustomerQontakResource\Pages;

use App\Filament\Resources\CustomerQontakResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Infolist;

class ViewCustomerQontak extends ViewRecord
{
    protected static string $resource = CustomerQontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function Infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Grid::make(2)->schema([
                    TextEntry::make('ccustcode')
                        ->label('Customer Code'),

                    TextEntry::make('ccustname')
                        ->label('Customer Name'),

                    TextEntry::make('custaddress')
                        ->label('Address')
                        ->columnSpanFull(),

                    TextEntry::make('ccustemail')
                        ->label('Email'),

                    TextEntry::make('ccustphone')
                        ->label('Phone'),

                    TextEntry::make('ccust2vanumber')
                        ->label('VA Number'),

                    TextEntry::make('ccust2provider')
                        ->label('Provider'),

                    TextEntry::make('ccust2bank')
                        ->label('Bank'),

                    TextEntry::make('ccust2mobile1')
                        ->label('Mobile 1'),

                    TextEntry::make('ccust2mobile2')
                        ->label('Mobile 2'),

                    TextEntry::make('ccust2email1')
                        ->label('Email 1'),

                    TextEntry::make('ccust2type')
                        ->label('Customer Type'),

                    TextEntry::make('ccuststatus')
                        ->label('Status'),

                    TextEntry::make('dcustlastup')
                        ->label('Last Update'),
                ]),
            ]);
    }
}