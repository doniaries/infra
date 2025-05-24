<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use App\Models\Opd;
use Filament\Forms;
use Filament\Tables;
use App\Models\Lapor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Str;
use App\Enums\StatusLaporan;
use Forms\Components\Select;
use Tables\Actions\EditAction;
use Tables\Columns\HtmlColumn;
use Filament\Resources\Resource;
use Forms\Components\FileUpload;
use Forms\Components\BadgeColumn;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\Column;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
// use Filament\Notifications\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LaporResource\Pages;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use App\Enums\StatusLaporan as EnumsStatusLaporan;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select as ComponentsSelect;
use App\Filament\Resources\LaporResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Tables\Enums\ActionsPosition;


class LaporResource extends Resource
{
    protected static ?string $model = Lapor::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationLabel = 'Laporan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()->columns(2)
                    ->schema([
                        Forms\Components\DateTimePicker::make('tgl_laporan')
                            ->default(Carbon::now())
                            ->readOnly(true)
                            ->disabled()
                            ->dehydrated(false)
                            ->timezone('Asia/Jakarta')
                            ->required(),
                        Forms\Components\TextInput::make('no_tiket')
                            ->label('No Tiket')
                            ->disabled()
                            ->dehydrated(false)
                            ->hint('No tiket Harap Dicatat Untuk Cek Status Laporan!')
                            ->hintIcon('heroicon-m-exclamation-circle')
                            ->hintColor('danger')
                            // ->helperText('Harap Dicatat Untuk Cek Status Laporan!')
                            ->default(fn($record) => $record && $record->exists ? $record->no_tiket : Str::random(5))
                            ->unique(ignoreRecord: true)
                            ->readOnly(true),
                    ]),

                Section::make()->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('nama_pelapor')
                            ->autocapitalize('sentences')
                            ->autofocus()
                            ->disabled()
                            ->dehydrated(false)
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('opd_id')
                            ->options(Opd::all()->pluck('nama', 'id'))
                            ->preload()
                            //mempercepat pencarian
                            ->searchDebounce(200)
                            //menambahkan data opd secara langsung di form
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Opd Anda'),
                            ])
                            ->disabled()
                            ->dehydrated(false)
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('jenis_laporan')
                            ->disabled()
                            ->dehydrated(false)
                            ->options([
                                'Laporan Gangguan' => 'Laporan Gangguan',
                                'Koordinasi Teknis' => 'Koordinasi Teknis',
                                'Kenaikan Bandwidth' => 'Kenaikan Bandwidth',
                            ])
                            ->default('Laporan Gangguan'),
                        Forms\Components\Textarea::make('uraian_laporan')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpan(2)
                            ->placeholder('tuliskan dan jelaskan secara singkat'),
                        Forms\Components\FileUpload::make('file_laporan')

                            ->placeholder('upload surat laporan'),
                    ]),

                Section::make()->columns(1)
                    ->schema([
                        Forms\Components\Textarea::make('keterangan_petugas')
                            ->hidden(fn($record) => !$record || !$record->exists)
                            ->label('Keterangan Petugas')
                            ->placeholder('Tuliskan Keterangan Petugas')
                            ->afterStateUpdated(function ($record) {
                                if ($record) {
                                    $record->update([
                                        'status_laporan' => 'Sedang Diproses'
                                    ]);
                                }
                            }),
                    ]),

                Section::make()->columns(2)
                    ->schema([
                        Forms\Components\Select::make('status_laporan')
                            ->hidden(true)
                            ->default('Belum Diproses'),

                        Forms\Components\Actions::make([
                            Forms\Components\Actions\Action::make('selesai')
                                ->label('Selesaikan Laporan')
                                ->icon('heroicon-o-check-circle')
                                ->color('success')
                                ->visible(fn($record) => $record && $record->status_laporan === 'Sedang Diproses')
                                ->requiresConfirmation()
                                ->modalHeading('Selesaikan Laporan')
                                ->modalDescription('Apakah Anda yakin ingin menyelesaikan laporan ini?')
                                ->action(function ($record) {
                                    try {
                                        // Update status dan simpan perubahan
                                        $record->fill([
                                            'status_laporan' => 'Selesai Diproses'
                                        ])->save();

                                        Notification::make()
                                            ->title('Laporan telah diselesaikan')
                                            ->success()
                                            ->send();

                                        // Redirect menggunakan helper redirect()
                                        return redirect()->route('filament.admin.resources.lapors.index');
                                    } catch (\Exception $e) {
                                        Notification::make()
                                            ->title('Gagal menyelesaikan laporan')
                                            ->danger()
                                            ->send();
                                    }
                                }),
                        ]),
                    ]),
            ]);
    }

    //--------------------tabel---------------
    public static function table(Table $table): Table
    {

        return $table
            ->headerActions([
                Action::make('refresh')
                    ->label('Refresh Data')
                    ->icon('heroicon-o-arrow-path')
                    ->action(function () {
                        // This will refresh the current page, effectively reloading the table data.
                        // Using static::getUrl('index') as a fallback if Referer is not available.
                        return redirect(request()->header('Referer') ?? static::getUrl('index'));
                    }),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('status_laporan')
                    ->badge()
                    ->color(function (string $state): string {
                        return match ($state) {
                            'Belum Diproses' => 'danger',
                            'Sedang Diproses' => 'warning',
                            'Selesai Diproses' => 'success',
                        };
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_laporan')
                    ->badge(function (string $state): string {
                        return match ($state) {
                            'Laporan Gangguan' => 'danger',
                            'Koordinasi Teknis' => 'warning',
                            'Kenaikan Bandwidth' => 'success',
                        };
                    })
                    ->colors([
                        'danger' => 'Laporan Gangguan',
                        'warning' => 'Koordinasi Teknis',
                    ]),
                Tables\Columns\TextColumn::make('no_tiket')
                    ->label('No Tiket')
                    ->copyable()
                    ->copyMessage('kode tiket disalin ')
                    ->copyMessageDuration(1500)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tgl_laporan')
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('nama_pelapor')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('opd.nama')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('uraian_laporan'),
                // sdsd
                Tables\Columns\TextColumn::make('keterangan_petugas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_laporan')
                    ->openUrlInNewTab()
                    ->url(fn($record) => Storage::url($record->file_laporan)),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            //mengurutkan inputan terakhir
            ->defaultSort('created_at', 'desc')
            ->filters([
                // Tambahkan filter di sini jika diperlukan

            ])
            // ->actions([
            // Tables\Actions\EditAction::make()
            //     ->iconButton()
            // ->slideOver()
            // ], position: ActionsPosition::BeforeColumns)

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLapors::route('/'),
            // 'create' => Pages\CreateLapor::route('/create'),
            // 'edit' => Pages\EditLapor::route('/{record}/edit'),
        ];
    }

    public function create()
    {
        // Logika untuk membuat laporan
        return view('lapor.index');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}