<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JorongResource\Pages;
use App\Filament\Resources\JorongResource\RelationManagers;
use App\Models\Jorong;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JorongResource extends Resource
{
    protected static ?string $model = Jorong::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nagari_id')
                    ->required()
                    ->relationship('nagari', 'nama_nagari'),
                Forms\Components\TextInput::make('nama_jorong')
                    ->label('Nama Jorong')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_kepala_jorong')
                    ->label('Nama Kepala Jorong')
                    ->maxLength(100),
                Forms\Components\TextInput::make('kontak_kepala_jorong')
                    ->label('Kontak Kepala Jorong')
                    ->maxLength(50),
                Forms\Components\TextInput::make('jumlah_penduduk_jorong')
                    ->label('Jumlah Penduduk Jorong')
                    ->numeric(),
                Forms\Components\TextInput::make('latitude')
                    ->label('Latitude')
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                    ->label('Longitude')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_jorong')
                    ->label('Nama Jorong')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nagari.nama_nagari')
                    ->label('Nama Nagari')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_kepala_jorong')
                    ->label('Nama Kepala Jorong'),
                Tables\Columns\TextColumn::make('kontak_kepala_jorong')
                    ->label('Kontak Kepala Jorong'),
                Tables\Columns\TextColumn::make('jumlah_penduduk_jorong')
                    ->label('Jumlah Penduduk Jorong'),
                Tables\Columns\TextColumn::make('latitude')
                    ->label('Latitude'),
                Tables\Columns\TextColumn::make('longitude')
                    ->label('Longitude'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('nagari.nama', 'asc')
            ->striped()
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJorongs::route('/'),
            // 'create' => Pages\CreateJorong::route('/create'),
            // 'edit' => Pages\EditJorong::route('/{record}/edit'),
        ];
    }


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }
}