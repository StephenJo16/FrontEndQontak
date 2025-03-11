<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerBillingResource\Pages;
use App\Models\CustomerBilling;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\NumberColumn;

class CustomerBillingResource extends Resource
{
    protected static ?string $model = CustomerBilling::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ccustcode')->label('Customer ID')->searchable(),
                TextColumn::make('ccustname')->label('Customer Name'),
                TextColumn::make('custaddress')->label('Address'),
                TextColumn::make('ccustphone')->label('Phone'),
                TextColumn::make('ccustemail1')->label('Email'),
                TextColumn::make('cbillhnumber')->label('Bill Number'),
                TextColumn::make('fbillhtotal')->label('Total Bill')->money('IDR'),
            ])
            ->filters([
                 Filter::make('Customer Name')
                    ->form([
                        Forms\Components\TextInput::make('ccustname')->label('Customer Name'),
                    ])
                    ->query(fn ($query, $data) => $query->when($data['ccustname'], fn ($q) => 
                        $q->where('ccustname', 'like', "%{$data['ccustname']}%"))),
                 Filter::make('Address')
                    ->form([
                        Forms\Components\TextInput::make('custaddress')->label('Address'),
                    ])
                    ->query(fn ($query, $data) => $query->when($data['custaddress'], fn ($q) => 
                        $q->where('custaddress', 'like', "%{$data['custaddress']}%"))),
            ])
            ->searchPlaceholder('Search by Customer ID')
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
        return [
            //
        ];
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