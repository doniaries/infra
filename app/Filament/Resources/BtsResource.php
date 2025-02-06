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
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Section;
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
                            Forms\Components\Select::make('operator_id')
                                ->relationship('operator', 'nama_operator')
                                ->preload()
                                ->required(),

                            Forms\Components\Select::make('kecamatan_id')
                                ->relationship('kecamatan', 'nama')
                                ->preload()
                                ->required()
                                ->searchable(),

                            Forms\Components\Select::make('nagari_id')
                                ->relationship('nagari', 'nama')
                                ->required()
                                ->searchable()
                                ->preload(),

                            Forms\Components\TextInput::make('lokasi')
                                ->label('Alamat Lengkap')
                                ->required(),


                            Actions::make([
                                Action::make('openMap')
                                    ->label('Buka di Google Maps')
                                    ->icon('heroicon-m-map')
                                    ->url(fn($get) => "https://www.google.com/maps?q=" . $get('latitude') . ',' . $get('longitude'))
                                    ->openUrlInNewTab()
                            ])->columnSpanFull(),
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
                                    if ($state) {
                                        $set('latitude', $state['lat']);
                                        $set('longitude', $state['lng']);
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
                                    'min-height: 150vh',
                                    'border-radius: 10px'
                                ])
                                ->liveLocation(true, true, 5000)
                                ->showMarker(true)
                                ->markerColor("#22c55eff")
                                ->markerHtml('<div class="custom-marker">...</div>')
                                ->markerIconUrl('/images/marker.png')
                                ->markerIconSize([32, 32])
                                ->markerIconClassName('my-marker-class')
                                ->markerIconAnchor([16, 32])
                                ->showFullscreenControl()
                                ->showZoomControl()
                                ->draggable()
                                ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                                ->zoom(14)
                                ->detectRetina()
                                ->showMyLocationButton()
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
                                ->required()
                                ->numeric()
                                ->live(onBlur: true) // Ubah ke onBlur
                                ->reactive() // Tambahkan ini
                                ->afterStateUpdated(function ($state, Set $set, $get) {
                                    if ($state && $get('longitude')) {
                                        $set('location', [
                                            'lat' => floatval($state),
                                            'lng' => floatval($get('longitude'))
                                        ]);
                                    }
                                }),

                            Forms\Components\TextInput::make('longitude')
                                ->label('Longitude')
                                ->required()
                                ->numeric()
                                ->live(onBlur: true) // Ubah ke onBlur
                                ->reactive() // Tambahkan ini
                                ->afterStateUpdated(function ($state, Set $set, $get) {
                                    if ($state && $get('latitude')) {
                                        $set('location', [
                                            'lat' => floatval($get('latitude')),
                                            'lng' => floatval($state)
                                        ]);
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
