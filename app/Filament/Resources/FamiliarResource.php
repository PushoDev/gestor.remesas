<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamiliarResource\Pages;
use App\Filament\Resources\FamiliarResource\RelationManagers;
use App\Models\Familiar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamiliarResource extends Resource
{
    protected static ?string $model = Familiar::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'Familiares o Amigos';

    // Counter
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationBadgeTooltip = 'Listado de familiares y amigos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('clients_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name_family'),
                Forms\Components\TextInput::make('phone_family')
                    ->tel(),
                Forms\Components\TextInput::make('address_family'),
                Forms\Components\TextInput::make('tipo_transaccion')
                    ->required(),
                Forms\Components\TextInput::make('receive_family'),
                Forms\Components\TextInput::make('card'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('clients_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_family')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_family')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_family')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_transaccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receive_family')
                    ->searchable(),
                Tables\Columns\TextColumn::make('card')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFamiliars::route('/'),
            'create' => Pages\CreateFamiliar::route('/create'),
            'edit' => Pages\EditFamiliar::route('/{record}/edit'),
        ];
    }
}
