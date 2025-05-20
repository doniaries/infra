<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataJorongResource\Pages;
use App\Models\DataJorong;
use App\Models\DataNagari;
use App\Models\Jorong;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DataJorongResource extends Resource
{
  protected static ?string $model = DataJorong::class;

  protected static ?string $navigationIcon = 'heroicon-o-document';

  protected static ?int $navigationSort = 6;

  public static function getNavigationGroup(): ?string
  {
    return 'Data Wilayah';
  }

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Select::make('nagari_id')
          ->label('Nagari')
          ->options(DataNagari::with('nagari')->get()->pluck('nagari.nama', 'id'))
          ->required()
          ->preload()
          ->searchable()
          ->reactive()
          ->afterStateUpdated(fn(callable $set) => $set('jorong_id', null)),
        Forms\Components\Select::make('jorong_id')
          ->label('Jorong')
          ->options(function (callable $get) {
            $nagariId = $get('nagari_id');
            if (!$nagariId) {
              return [];
            }
            $dataNagari = DataNagari::find($nagariId);
            if (!$dataNagari) {
              return [];
            }
            return Jorong::where('nagari_id', $dataNagari->nagari_id)->pluck('nama', 'id');
          })
          ->required()
          ->preload()
          ->searchable(),
        Forms\Components\TextInput::make('nama_kepala_jorong')
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
        Tables\Columns\TextColumn::make('dataNagari.nagari.nama')
          ->label('Nagari')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('jorong.nama')
          ->label('Jorong')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('nama_kepala_jorong')
          ->label('Kepala Jorong')
          ->searchable(),
        Tables\Columns\TextColumn::make('kontak')
          ->label('Kontak')
          ->searchable(),
        Tables\Columns\TextColumn::make('jumlah_penduduk')
          ->label('Jumlah Penduduk')
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
      'index' => Pages\ListDataJorongs::route('/'),
      'create' => Pages\CreateDataJorong::route('/create'),
      'edit' => Pages\EditDataJorong::route('/{record}/edit'),
    ];
  }
}
