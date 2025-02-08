<?php

namespace App\Filament\Resources;

use App\Models\Bts;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Forms\Components\Button;
use Filament\Resources\Resource;
use Dotswan\MapPicker\Fields\Map;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BtsResource\Pages;
use Filament\Forms\Components\Actions\Action;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BtsResource\RelationManagers;

class BtsResource extends Resource
{
    protected static ?string $model = Bts::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

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

                            Forms\Components\TextInput::make('titik_koordinat')
                                ->label('Titik Koordinat')
                                // ->disabled()
                                ->required(),


                            Actions::make([
                                Action::make('openMap')
                                    ->label('Buka di Google Maps')
                                    ->icon('heroicon-m-map')
                                    ->url(fn($get) => "https://www.google.com/maps?q=" . $get('latitude') . ',' . $get('longitude'))
                                    ->openUrlInNewTab()
                            ])->columnSpanFull(),


                            Forms\Components\Select::make('operator_id')
                                ->relationship('operator', 'nama_operator')
                                ->required(),

                            Forms\Components\Select::make('kecamatan_id')
                                ->relationship('kecamatan', 'nama')
                                ->required()
                                ->live(),

                            Forms\Components\Select::make('nagari_id')
                                ->relationship(
                                    'nagari',
                                    'nama',
                                    fn(Builder $query, callable $get) =>
                                    $query->when(
                                        $get('kecamatan_id'),
                                        fn($query, $kecamatan_id) =>
                                        $query->where('kecamatan_id', $kecamatan_id)
                                    )
                                )
                                ->required()
                                ->searchable()
                                ->preload()
                                ->live()
                                ->visible(fn(callable $get) => filled($get('kecamatan_id')))
                                ->afterStateUpdated(fn(callable $set) => $set('jorong_id', null)),

                            Forms\Components\Select::make('jorong_id')
                                ->relationship(
                                    'jorong',
                                    'nama',
                                    fn(Builder $query, callable $get) =>
                                    $query->when(
                                        $get('nagari_id'),
                                        fn($query, $nagari_id) =>
                                        $query->where('nagari_id', $nagari_id)
                                    )
                                )
                                // ->required()
                                ->searchable()
                                ->preload()
                                ->visible(fn(callable $get) => filled($get('nagari_id'))),


                            Forms\Components\TextInput::make('pemilik')
                                ->label('Pemilik BTS')
                                ->required(),
                            Forms\Components\TextInput::make('alamat')
                                ->label('Alamat')
                                ->required(),


                            Forms\Components\Select::make('teknologi')
                                ->options([
                                    '2G' => '2G',
                                    '3G' => '3G',
                                    '4G' => '4G',
                                    '4G+5G' => '4G+5G',
                                    '5G' => '5G',
                                ])

                                ->default('4G')
                                ->required(),

                            Forms\Components\Select::make('status')
                                ->options([
                                    'aktif' => 'Aktif',
                                    'non-aktif' => 'Non-Aktif'
                                ])
                                ->default('aktif')
                                ->required(),

                            Forms\Components\TextInput::make('tahun_bangun')
                                ->numeric()
                                ->default('2023')
                                ->minValue(2000)
                                ->maxValue(2030),

                        ]),

                    // Kolom Kanan - Peta
                    Section::make('Lokasi BTS')
                        ->columnSpan(1)
                        ->schema([
                            Map::make('location')
                                ->label('Peta')
                                ->helperText(new HtmlString(' <strong> Klik lokasi pada peta.</strong>'))
                                ->columnSpanFull()
                                ->defaultLocation(-0.6659520479353943, 100.9443495032019)
                                ->afterStateUpdated(function (Set $set, ?array $state): void {
                                    if ($state) {
                                        $lat = number_format($state['lat'], 6, '.', '');
                                        $lng = number_format($state['lng'], 6, '.', '');

                                        $set('latitude', $lat);
                                        $set('longitude', $lng);
                                        $set('titik_koordinat', $lat . ', ' . $lng);
                                    }
                                })
                                ->afterStateHydrated(function (Map $component, $state, $record): void {
                                    if ($record && $record->latitude && $record->longitude) {
                                        $component->state([
                                            'lat' => (float)$record->latitude,
                                            'lng' => (float)$record->longitude,
                                        ]);
                                    }
                                })
                                ->extraStyles([
                                    'min-height: 50vh',
                                    'border-radius: 10px'
                                ])
                                ->liveLocation(true, false, 100000) //agar peta bisa ambil koordinat
                                ->showMarker(true)
                                ->markerColor("#22c55eff")
                                ->markerHtml('<div class="custom-marker">...</div>')
                                ->markerIconUrl('/images/marker.png')
                                ->markerIconSize([32, 32])
                                ->markerIconClassName('my-marker-class')
                                ->markerIconAnchor([16, 32])
                                ->showFullscreenControl()
                                ->showZoomControl()
                                ->draggable(true)
                                ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                                ->zoom(14)
                                ->detectRetina()
                                ->showMyLocationButton(true)
                                ->geoMan(false)
                                ->geoManEditable(false)
                                ->geoManPosition('topleft')
                                ->drawCircleMarker()
                                ->rotateMode()
                                ->clickable(true) //click to move marker
                                ->drawMarker()
                                ->drawPolygon()
                                ->drawPolyline()
                                ->drawCircle()
                                ->dragMode(true)
                                ->cutPolygon()
                                ->editPolygon()
                                ->deleteLayer()
                                ->setColor('#3388ff')
                                ->setFilledColor('#cad9ec'),

                            Forms\Components\TextInput::make('latitude')
                                ->label('Latitude')
                                // ->required()
                                ->numeric()
                                ->live()
                                ->afterStateUpdated(function ($state, Set $set, $get) {
                                    if ($state) {
                                        $longitude = $get('longitude');
                                        if ($longitude) {
                                            // Format angka dengan 6 digit desimal
                                            $lat = number_format(floatval($state), 6, '.', '');
                                            $lng = number_format(floatval($longitude), 6, '.', '');

                                            $set('location', [
                                                'lat' => floatval($lat),
                                                'lng' => floatval($lng)
                                            ]);
                                            $set('lokasi', $lat . ', ' . $lng);
                                        }
                                    }
                                }),


                            Forms\Components\TextInput::make('longitude')
                                ->label('Longitude')
                                // ->required()
                                ->numeric()
                                ->live()
                                ->afterStateUpdated(function ($state, Set $set, $get) {
                                    if ($state) {
                                        $latitude = $get('latitude');
                                        if ($latitude) {
                                            // Format angka dengan 6 digit desimal
                                            $lat = number_format(floatval($latitude), 6, '.', '');
                                            $lng = number_format(floatval($state), 6, '.', '');

                                            $set('location', [
                                                'lat' => floatval($lat),
                                                'lng' => floatval($lng)
                                            ]);
                                            $set('lokasi', $lat . ', ' . $lng);
                                        }
                                    }
                                }),

                        ]),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('operator.nama_operator')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'TELKOMSEL' => 'danger',

                        'INDOSAT' => 'warning',
                        'XL AXIATA' => 'primary',
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nagari.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('titik_koordinat')
                    ->copyable()
                    ->label('Titik Koordinat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('location.lat')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('location.lng')
                //     ->searchable(),

                Tables\Columns\TextColumn::make('teknologi')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '2G' => 'danger',
                        '3G' => 'primary',
                        '4G' => 'secondary',
                        '4G+5G' => 'info',
                        '5G' => 'success',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'aktif' => 'success',
                        'non-aktif' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('tahun_bangun')
                    ->sortable(),
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
            // 'create' => Pages\CreateBts::route('/create'),
            // 'edit' => Pages\EditBts::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}