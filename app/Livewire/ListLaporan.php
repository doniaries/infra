<?php

namespace App\Livewire;

use App\Models\Lapor;
use App\Models\Opd;
use App\Services\LaporForm;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class ListLaporan extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;
    public function render()
    {
        return view('livewire.list-laporan');
    }

    // public function index()
    // {
    //     return view('laporform');
    // }

    public function table(Table $table): Table
    {
        return $table
            ->query(Lapor::query())
            ->columns([
                Tables\Columns\TextColumn::make('no_tiket')
                    ->badge()
                    ->label('No Tiket')
                    ->color('success')
                    ->copyable()
                    ->copyMessage('kode tiket disalin ')
                    ->copyMessageDuration(2000)
                    ->searchable()
                    ->weight(FontWeight::Bold)
                    ->fontFamily(FontFamily::Sans)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tgl_laporan')
                    ->badge()
                    ->dateTime('d-m-Y H:i:s')
                    ->default(Carbon::now())
                    ->timezone('Asia/Jakarta')
                    ->color('info'),
                Tables\Columns\TextColumn::make('opd.name'),
                Tables\Columns\TextColumn::make('status_laporan')
                    ->badge()
                    ->color(function (string $state): string {
                        return match ($state) {
                            'Belum Diproses' => 'danger',
                            'Sedang Diproses' => 'warning',
                            'Selesai Diproses' => 'success',
                        };
                    }),
                Tables\Columns\TextColumn::make('keterangan_petugas'),
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
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Laporan Baru')
                    ->model(Lapor::class)
                    ->form(LaporForm::schema())
                    // ->successNotification(
                    //     Notification::make()
                    //         ->success()
                    //         ->title('Laporan berhasil dibuat')
                    //         ->body('Laporan baru telah diterima ke sistem')
                    //         ->persistent()
                    //         ->sendToDatabase(true)
                    // )

            ])
            ->emptyStateHeading('Belum Ada Laporan')
            ->emptyStateIcon('heroicon-m-chat-bubble-left-right');
    }
}