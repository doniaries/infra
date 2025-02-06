<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BtsResource\Pages;
use App\Filament\Resources\BtsResource\RelationManagers;
use App\Models\Bts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BtsResource extends Resource
{
    protected static ?string $model = Bts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('operator_id')
                    ->relationship('operator', 'nama_operator')
                    ->required(),
                Forms\Components\Select::make('nagari_id')
                    ->relationship('nagari', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('kecamatan_id')
                    ->relationship('kecamatan', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('latitude')
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                    ->numeric(),
                Forms\Components\Select::make('teknologi')
                    ->options([
                        '2G' => '2G',
                        '3G' => '3G',
                        '4G' => '4G',
                        '4G+5G' => '4G+5G',
                        '5G' => '5G',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('tahun_bangun')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pemilik')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('operator_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nagari_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kecamatan_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teknologi'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('tahun_bangun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pemilik')
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
            'index' => Pages\ListBts::route('/'),
            // 'create' => Pages\CreateBts::route('/create'),
            // 'edit' => Pages\EditBts::route('/{record}/edit'),
        ];
    }
}
