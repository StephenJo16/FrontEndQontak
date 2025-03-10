<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerQontakResource\Pages;
use App\Filament\Resources\CustomerQontakResource\RelationManagers;
use App\Models\CustomerQontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerQontakResource extends Resource
{
    protected static ?string $model = CustomerQontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ccustcode')->label('Customer ID')->searchable(),
                TextColumn::make('ccustname')->label('Customer Name')->searchable(),
                TextColumn::make('custaddress')->label('Address')->searchable(),
                TextColumn::make('ccust2loccode')->label('Location Code')->searchable(),
                TextColumn::make('ccustemail')->label('Email')->searchable(),
                TextColumn::make('ccustphone')->label('Phone')->searchable(),
                TextColumn::make('ccust2vanumber')->label('VA Number')->searchable(),
                TextColumn::make('ccust2provider')->label('Provider')->searchable(),
                TextColumn::make('ccust2bank')->label('Bank')->searchable(),
                TextColumn::make('ccust2mobile1')->label('Mobile 1')->searchable(),
                TextColumn::make('ccust2mobile2')->label('Mobile 2')->searchable(),
                TextColumn::make('ccust2email1')->label('Email 1')->searchable(),
                TextColumn::make('ccust2type')->label('Customer Type')->searchable(),
                TextColumn::make('ccuststatus')->label('Status')->searchable(),
                TextColumn::make('dcustlastup')->label('Last Update')->sortable(),
            ])
            ->filters([
                Filter::make('Last Update')
                    ->form([
                        Forms\Components\DatePicker::make('dcustlastup')->label('Last Update'),
                    ])
                    ->query(fn ($query, $data) => $query->when($data['dcustlastup'], fn ($q) => 
                        $q->where('dcustlastup', '>=', $data['dcustlastup']))
                    ),
            ])
            ->actions([
                
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
            'index' => Pages\ListCustomerQontaks::route('/'),
            'create' => Pages\CreateCustomerQontak::route('/create'),
            'view' => Pages\ViewCustomerQontak::route('/{record}'),
            'edit' => Pages\EditCustomerQontak::route('/{record}/edit'),
        ];
    }
}