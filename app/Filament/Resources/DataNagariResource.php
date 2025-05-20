<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataNagariResource\Pages;
use App\Models\DataNagari;
use App\Models\Kecamatan;
use App\Models\Nagari;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DataNagariResource extends Resource
{
  protected static ?string $model = DataNagari::class;

  protected static ?string $navigationIcon = 'heroicon-o-document-text';

  protected static ?int $navigationSort = 5;

  public static function getNavigationGroup(): ?string
  {
    return 'Data Wilayah';
  }

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Select::make('kecamatan_id')
          ->label('Kecamatan')
          ->options(Kecamatan::pluck('nama', 'id'))
          ->required()
          ->preload()
          ->searchable()
          ->reactive()
          ->afterStateUpdated(fn(callable $set) => $set('nagari_id', null)),
        Forms\Components\Select::make('nagari_id')
          ->label('Nagari')
          ->options(function (callable $get) {
            $kecamatanId = $get('kecamatan_id');
            if (!$kecamatanId) {
              return [];
            }
            return Nagari::where('kecamatan_id', $kecamatanId)->pluck('nama', 'id');
          })
          ->required()
          ->preload()
          ->searchable(),
        Forms\Components\TextInput::make('nama_wali_nagari')
          ->required()
          ->maxLength(255)
          ->extraInputAttributes(['style' => 'text-transform: uppercase']),
        Forms\Components\TextInput::make('alamat')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('kontak')
          ->required()
          ->tel()
          ->maxLength(20),
        Forms\Components\TextInput::make('jumlah_penduduk')
          ->required()
          ->numeric()
          ->minValue(0),
        Forms\Components\TextInput::make('jumlah_jorong')
          ->required()
          ->numeric()
          ->minValue(0),
        Forms\Components\TextInput::make('mata_pencaharian')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('penghasilan_rata_rata')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('sarana_kesehatan')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('sarana_pasar')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('usia_produktif')
          ->required()
          ->numeric()
          ->minValue(0),
        Forms\Components\TextInput::make('kegiatan_ekonomi')
          ->required()
          ->maxLength(255),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('kecamatan.nama')
          ->label('Kecamatan')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('nagari.nama')
          ->label('Nagari')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('nama_wali_nagari')
          ->label('Wali Nagari')
          ->searchable(),
        Tables\Columns\TextColumn::make('kontak')
          ->label('Kontak')
          ->searchable(),
        Tables\Columns\TextColumn::make('jumlah_penduduk')
          ->label('Jumlah Penduduk')
          ->numeric()
          ->sortable(),
        Tables\Columns\TextColumn::make('jumlah_jorong')
          ->label('Jumlah Jorong')
          ->numeric()
          ->sortable(),
        Tables\Columns\TextColumn::make('usia_produktif')
          ->label('Usia Produktif')
          ->numeric()
          ->sortable(),
        Tables\Columns\TextColumn::make('created_at')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
        Tables\Columns\TextColumn::make('updated_at')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->defaultSort('created_at', 'desc')
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
      'index' => Pages\ListDataNagaris::route('/'),
      'create' => Pages\CreateDataNagari::route('/create'),
      'edit' => Pages\EditDataNagari::route('/{record}/edit'),
    ];
  }
}
