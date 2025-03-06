<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BillingQontakResource\Pages;
use App\Filament\Resources\BillingQontakResource\RelationManagers;
use App\Models\BillingQontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;
use Filament\Tables\Columns\NumberColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class BillingQontakResource extends Resource
{
    protected static ?string $model = BillingQontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

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
                TextColumn::make('cbillhnumber')->label('Bill Number')->searchable(),
                TextColumn::make('cbillhcustomerbillcd')->label('Customer Bill Code')->searchable(),
                TextColumn::make('dbillhdate')->label('Billing Date'),
                TextColumn::make('fbillhnettvalue')->label('Net Value')->money('IDR'),
                TextColumn::make('fbillhtotal')->label('Total Bill')->money('IDR'),

            ])
            ->filters([
                Filter::make('Start Date')
                    ->form([
                        Forms\Components\DatePicker::make('dbillhstartperiod')->label('Start Date'),
                    ])
                    ->query(fn ($query, $data) => $query->when($data['dbillhstartperiod'], fn ($q) => 
                        $q->where('dbillhstartperiod', '>=', $data['dbillhstartperiod']))
                    ),

                Filter::make('End Date')
                    ->form([
                        Forms\Components\DatePicker::make('dbillhendperiod')->label('End Date'),
                    ])
                    ->query(fn ($query, $data) => $query->when($data['dbillhendperiod'], fn ($q) => 
                        $q->where('dbillhendperiod', '<=', $data['dbillhendperiod']))
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
            'index' => Pages\ListBillingQontaks::route('/'),
            'create' => Pages\CreateBillingQontak::route('/create'),
            'view' => Pages\ViewBillingQontak::route('/{record}'),
            'edit' => Pages\EditBillingQontak::route('/{record}/edit'),
        ];
    }
}