<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NagariResource\Pages;
use App\Filament\Resources\NagariResource\RelationManagers;
use App\Models\Nagari;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NagariResource extends Resource
{
    protected static ?string $model = Nagari::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kecamatan_id')
                    ->required()
                    ->preload()
                    ->relationship('kecamatan', 'nama')
                    ->searchable(),
                Forms\Components\TextInput::make('nama_nagari')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->live()
                    ->extraInputAttributes(['style' => 'text-transform: uppercase']) // uppercase
                    ->maxLength(50),
                Forms\Components\TextInput::make('nama_wali_nagari')
                    ->required()
                    ->label('Nama Wali Nagari')
                    ->maxLength(100),
                Forms\Components\TextInput::make('alamat_kantor')
                    ->label('Alamat Kantor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak_wali_nagari')
                    ->required()
                    ->label('Kontak Wali Nagari')
                    ->placeholder('081234567890')
                    ->tel()
                    ->maxLength(50),
                Forms\Components\TextInput::make('luas_nagari')
                    ->label('Luas Nagari')
                    ->placeholder('tulis dalam angka ')
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_penduduk')
                    ->label('Jumlah Penduduk')
                    ->placeholder('tulis dalam angka ')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_jorong')
                    ->label('Jumlah Jorong')
                    ->placeholder('tulis dalam angka ')
                    ->required()
                    ->numeric(),
                // Forms\Components\TextInput::make('latitude')
                //     ->label('Latitude')
                //     ->maxLength(20),
                // Forms\Components\TextInput::make('longitude')
                //     ->label('Longitude')
                //     ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_nagari')
                    ->label('Nama Nagari')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Nama Kecamatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_wali_nagari')
                    ->label('Nama Wali Nagari'),
                Tables\Columns\TextColumn::make('alamat_kantor')
                    ->label('Alamat Kantor'),
                Tables\Columns\TextColumn::make('kontak_wali_nagari')
                    ->label('Kontak Wali Nagari'),
                Tables\Columns\TextColumn::make('luas_nagari')
                    ->sortable()
                    ->label('Luas Nagari'),
                Tables\Columns\TextColumn::make('jumlah_penduduk')
                    ->sortable()
                    ->label('Jumlah Penduduk'),
                Tables\Columns\TextColumn::make('jumlah_jorong')
                    ->sortable()
                    ->label('Jumlah Jorong'),
                // Tables\Columns\TextColumn::make('latitude')
                //     ->label('Latitude'),
                // Tables\Columns\TextColumn::make('longitude')
                //     ->label('Longitude'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->defaultSort('kecamatan.nama', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->closeModalByClickingAway(false)
                    ->slideOver(),
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
            'index' => Pages\ListNagaris::route('/'),
            // 'create' => Pages\CreateNagari::route('/create'),
            // 'edit' => Pages\EditNagari::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'danger';
    }
}
