<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientsResource\Pages;
use App\Filament\Resources\ClientsResource\RelationManagers;
use App\Models\Clients;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientsResource extends Resource
{
    protected static ?string $model = Clients::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Clientes';

    // Counter
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationBadgeTooltip = 'Clientes Atendidos';
    // Global Search
    public static function getGloballySearchableAttributes(): array
    {
        return ['name_clienys', 'phone_clients', 'send_clients'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_clients')
                    ->label('Nombre del Cliente')
                    ->suffixIcon('heroicon-m-user')
                    ->suffixIconColor('warning')
                    ->required(),
                Forms\Components\TextInput::make('phone_clients')
                    ->label('No. de Contacto')
                    ->suffixIcon('heroicon-m-device-phone-mobile')
                    ->suffixIconColor('primary')
                    ->tel()
                    ->numeric()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->required(),
                Forms\Components\TextInput::make('send_clients')
                    ->label('Cantidad de Envío')
                    ->numeric()
                    ->inputMode('decimal')
                    ->suffixIcon('heroicon-m-currency-dollar')
                    ->suffixIconColor('success')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_clients')
                    ->searchable()
                    ->label('Nombre del Cliente')
                    ->icon('heroicon-m-user')
                    ->iconColor('primary'),
                Tables\Columns\TextColumn::make('phone_clients')
                    ->searchable()
                    ->label('Teléfono del Cliente')
                    ->icon('heroicon-m-phone')
                    ->iconColor('warning'),
                Tables\Columns\TextColumn::make('send_clients')
                    ->searchable()
                    ->label('Monto que Envía')
                    ->icon('heroicon-m-banknotes')
                    ->iconColor('success'),
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
                Tables\Actions\DeleteAction::make(),
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
            // Relations 1 -> 1 or 1 -> M
            // RelationManagers\FamiliarRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClients::route('/create'),
            'edit' => Pages\EditClients::route('/{record}/edit'),
        ];
    }
}
