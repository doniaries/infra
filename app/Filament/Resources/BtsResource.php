<?php

namespace App\Filament\Resources;

use App\Models\Bts;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BtsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BtsResource\RelationManagers;

class BtsResource extends Resource
{
    protected static ?string $model = Bts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make()
                ->columns(2)
                ->schema([
                    // Kolom Kiri - Form Isian
                    Section::make('Informasi BTS')
                        ->columnSpan(1)
                        ->schema([
                            Forms\Components\Select::make('operator_id')
                                ->relationship('operator', 'nama_operator')
                                ->required()
                                ->searchable(),

                            Forms\Components\Select::make('kecamatan_id')
                                ->relationship('kecamatan', 'nama')
                                ->required()
                                ->searchable()
                                ->preload(),

                            Forms\Components\Select::make('nagari_id')
                                ->relationship('nagari', 'nama')
                                ->required()
                                ->searchable()
                                ->preload(),

                            Forms\Components\TextInput::make('lokasi')
                                ->label('Alamat Lengkap')
                                ->required(),

                            Forms\Components\Select::make('teknologi')
                                ->options([
                                    '2G' => '2G',
                                    '3G' => '3G',
                                    '4G' => '4G',
                                    '4G+5G' => '4G+5G',
                                    '5G' => '5G',
                                ])
                                ->required(),

                            Forms\Components\Select::make('status')
                                ->options([
                                    'aktif' => 'Aktif',
                                    'non-aktif' => 'Non-Aktif'
                                ])
                                ->required(),

                            Forms\Components\TextInput::make('tahun_bangun')
                                ->required()
                                ->maxLength(4),



                        ]),

                    // Kolom Kanan - Peta
                    Section::make('Lokasi BTS')
                        ->columnSpan(1)
                        ->schema([
                            Map::make('location')
                                ->label('Peta')
                                ->columnSpanFull()
                                ->defaultLocation(-0.663802906743856, 100.9366966185208)
                                ->afterStateUpdated(function (Set $set, ?array $state): void {
                                    if (isset($state['lat']) && isset($state['lng'])) {
                                        $set('latitude', (string)$state['lat']);
                                        $set('longitude', (string)$state['lng']);
                                    }
                                })
                                ->afterStateHydrated(function ($component, $state, $record): void {
                                    if ($record) {
                                        $component->state([
                                            'lat' => (float)$record->latitude,
                                            'lng' => (float)$record->longitude,
                                        ]);
                                    }
                                })
                                ->extraStyles([
                                    'min-height: 600px',
                                    'border-radius: 8px'
                                ])
                                ->showMarker()
                                ->draggable(true)
                                ->clickable(true)
                                ->showZoomControl()
                                ->showFullscreenControl()
                                ->showMyLocationButton()
                                ->zoom(14)
                                ->tilesUrl("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"),
                            // Actions::make([
                            //     Action::make('Set Default Location')
                            //         ->icon('heroicon-m-map-pin')
                            //         ->action(function (Set $set, $state, $livewire): void {
                            //             $set('location', [
                            //                 'lat' => '-0.663802906743856',
                            //                 'lng' => '100.9366966185208'
                            //             ]);
                            //             $set('latitude', '-0.663802906743856');
                            //             $set('longitude', '100.9366966185208');
                            //             $livewire->dispatch('refreshMap');
                            //         })
                            // ])->verticalAlignment(VerticalAlignment::Start),
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\TextInput::make('latitude')
                                        ->label('Latitude')
                                        ->required()
                                        ->numeric()
                                        ->readOnly()
                                        ->dehydrated(true),
                                    Forms\Components\TextInput::make('longitude')
                                        ->label('Longitude')
                                        ->required()
                                        ->numeric()
                                        ->readOnly()
                                        ->dehydrated(true),
                                ]),
                        ]),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('operator.nama_operator')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nagari.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('teknologi')
                    ->badge(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'aktif' => 'success',
                        'non-aktif' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('tahun_bangun'),
                Tables\Columns\TextColumn::make('pemilik'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBts::route('/'),
            'create' => Pages\CreateBts::route('/create'),
            'edit' => Pages\EditBts::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}