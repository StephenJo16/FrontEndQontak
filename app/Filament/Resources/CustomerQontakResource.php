<?php

// namespace App\Filament\Resources;

// use App\Filament\Resources\CustomerQontakResource\Pages;
// use App\Filament\Resources\CustomerQontakResource\RelationManagers;
// use App\Models\CustomerQontak;
// use Filament\Forms;
// use Filament\Forms\Form;
// use Filament\Resources\Resource;
// use Filament\Tables;
// use Filament\Tables\Table;
// use Filament\Tables\Columns\TextColumn;
// use Filament\Tables\Filters\Filter;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

// class CustomerQontakResource extends Resource
// {
//     protected static ?string $model = CustomerQontak::class;

//     protected static ?string $navigationIcon = 'heroicon-o-user-group';

//     protected static ?string $navigationGroup = 'Resources';

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 //
//             ]);
//     }
//     public static function getNavigationBadge(): ?string
//     {
//         return static::getModel()::count();
//     }


//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([
//                 TextColumn::make('ccustcode')->label('Customer ID')->searchable(),
//                 TextColumn::make('ccustname')->label('Customer Name'),
//                 TextColumn::make('custaddress')->label('Address'),
//                 TextColumn::make('ccust2loccode')->label('Location Code'),
//                 TextColumn::make('ccustphone')->label('Phone'),
//                 TextColumn::make('ccust2provider')->label('Provider'),
//                 TextColumn::make('ccust2bank')->label('Bank'),
//                 TextColumn::make('ccust2type')->label('Customer Type'),
//                 TextColumn::make('ccuststatus')->label('Status'),
//                 TextColumn::make('dcustlastup')->label('Last Update'),
//             ])
//             ->filters([
//                 Filter::make('Last Update')
//                     ->form([
//                         Forms\Components\DatePicker::make('dcustlastup')->label('Last Update'),
//                     ])
//                     ->query(fn ($query, $data) => $query->when($data['dcustlastup'], fn ($q) => 
//                         $q->where('dcustlastup', '>=', $data['dcustlastup']))
//                     ),
//                  Filter::make('Customer Name')
//                     ->form([
//                         Forms\Components\TextInput::make('ccustname')->label('Customer Name'),
//                     ])
//                     ->query(fn ($query, $data) => $query->when($data['ccustname'], fn ($q) => 
//                         $q->where('ccustname', 'like', "%{$data['ccustname']}%"))),
//                  Filter::make('Address')
//                     ->form([
//                         Forms\Components\TextInput::make('custaddress')->label('Address'),
//                     ])
//                     ->query(fn ($query, $data) => $query->when($data['custaddress'], fn ($q) => 
//                         $q->where('custaddress', 'like', "%{$data['custaddress']}%"))),
//             ])
//             ->searchPlaceholder('Search by Customer ID')
//             ->actions([
                
//             ])
//             ->bulkActions([
//                 Tables\Actions\BulkActionGroup::make([
//                     Tables\Actions\DeleteBulkAction::make(),
//                 ]),
//             ]);
//     }

//     public static function getRelations(): array
//     {
//         return [
//             //
//         ];
//     }

//     public static function getPages(): array
//     {
//         return [
//             'index' => Pages\ListCustomerQontaks::route('/'),
//             'create' => Pages\CreateCustomerQontak::route('/create'),
//             'view' => Pages\ViewCustomerQontak::route('/{record}'),
//             'edit' => Pages\EditCustomerQontak::route('/{record}/edit'),
//         ];
//     }