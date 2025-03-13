<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortalC3Resource\Pages;
use App\Models\PortalC3;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

class PortalC3Resource extends Resource
{
    protected static ?string $model = PortalC3::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Resources';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ccustomer_id')
                    ->label('Customer ID')
                    ->searchable(),
                TextColumn::make('ccustname')
                    ->label('Customer Name')
                    ->searchable(),
                TextColumn::make('custaddress')
                    ->label('Address')
                    ->searchable(),
            ])
            ->filters([
                // Filter::make('Customer Name')
                //     ->form([
                //         Forms\Components\TextInput::make('ccustname')
                //             ->label('Customer Name'),
                //     ])
                //     ->query(fn ($query, $data) =>
                //         $query->when($data['ccustname'], fn ($q) =>
                //             $q->whereRaw('LOWER(ccustname) LIKE ?', ['%' . strtolower($data['ccustname']) . '%'])
                //         )
                //     ),
                // Filter::make('Address')
                //     ->form([
                //         Forms\Components\TextInput::make('custaddress')
                //             ->label('Address'),
                //     ])
                //     ->query(fn ($query, $data) =>
                //         $query->when($data['custaddress'], fn ($q) =>
                //             $q->whereRaw('LOWER(custaddress) LIKE ?', ['%' . strtolower($data['custaddress']) . '%'])
                //         )
                //     ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortalC3S::route('/'),
            'create' => Pages\CreatePortalC3::route('/create'),
            'view' => Pages\ViewPortalC3::route('/{record}'),
            'edit' => Pages\EditPortalC3::route('/{record}/edit'),
        ];
    }
}