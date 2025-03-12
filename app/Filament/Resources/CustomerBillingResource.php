<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerBillingResource\Pages;
use App\Models\CustomerBilling;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CustomerBillingResource extends Resource
{
    protected static ?string $model = CustomerBilling::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Resources';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([]);
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ccustcode')->label('Customer ID')->searchable(),
                TextColumn::make('ccustname')->label('Customer Name'),
                TextColumn::make('custaddress')->label('Address')
            ])
            ->filters([
                Filter::make('Customer Name')
                    ->form([
                        Forms\Components\TextInput::make('ccustname')->label('Customer Name'),
                    ])
                    ->query(fn ($query, $data) =>
                        $query->when($data['ccustname'], fn ($q) =>
                            $q->whereRaw('LOWER(ccustname) LIKE ?', ['%' . strtolower($data['ccustname']) . '%'])
                        )
                    ),
                Filter::make('Address')
                    ->form([
                        Forms\Components\TextInput::make('custaddress')->label('Address'),
                    ])
                    ->query(fn ($query, $data) =>
                        $query->when($data['custaddress'], fn ($q) =>
                            $q->whereRaw('LOWER(custaddress) LIKE ?', ['%' . strtolower($data['custaddress']) . '%'])
                        )
                    ),
            ])
            ->searchable()
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomerBillings::route('/'),
            'create' => Pages\CreateCustomerBilling::route('/create'),
            'view' => Pages\ViewCustomerBilling::route('/{record}'),
            'edit' => Pages\EditCustomerBilling::route('/{record}/edit'),
        ];
    }
}