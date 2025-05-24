<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TindakLanjutResource\Pages;
use App\Filament\Resources\TindakLanjutResource\RelationManagers;
use App\Models\TindakLanjut;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Support\Facades\Storage;

class TindakLanjutResource extends Resource
{
    protected static ?string $model = TindakLanjut::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationLabel = 'Tindak Lanjut';
    protected static ?string $pluralModelLabel = 'Tindak Lanjut';
    protected static ?string $modelLabel = 'Tindak Lanjut';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('lapor_id')
                    ->relationship('lapor', 'no_tiket')
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($state, $set) => $set('lapor_details', $state)),

                Forms\Components\Hidden::make('lapor_details'),

                Forms\Components\Section::make('Detail Laporan')
                    ->schema([
                        Forms\Components\Placeholder::make('detail_laporan')
                            ->content(function ($get) {
                                $laporId = $get('lapor_id');
                                if (!$laporId) return 'Pilih laporan terlebih dahulu';
                                
                                $lapor = \App\Models\Lapor::find($laporId);
                                if (!$lapor) return 'Laporan tidak ditemukan';
                                
                                return view('filament.components.lapor-detail', ['lapor' => $lapor]);
                            })
                    ])
                    ->visible(fn ($get) => (bool) $get('lapor_id')),

                Forms\Components\Select::make('petugas_id')
                    ->relationship('petugas', 'name')
                    ->label('Petugas')
                    ->searchable()
                    ->required(),
                Forms\Components\Textarea::make('keterangan')->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'Belum Diproses' => 'Belum Diproses',
                        'Sedang Diproses' => 'Sedang Diproses',
                        'Selesai' => 'Selesai',
                    ])
                    ->default('Belum Diproses')
                    ->required(),

                Forms\Components\DateTimePicker::make('tanggal')
                    ->default(now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lapor.no_tiket')->label('No Tiket'),
                Tables\Columns\TextColumn::make('petugas.name')->label('Petugas'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('tanggal')->dateTime(),
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
            'index' => Pages\ListTindakLanjuts::route('/'),
            'create' => Pages\CreateTindakLanjut::route('/create'),
            'edit' => Pages\EditTindakLanjut::route('/{record}/edit'),
        ];
    }
}