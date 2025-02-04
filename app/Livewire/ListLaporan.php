<?php

namespace App\Livewire;

use App\Models\Opd;
use Filament\Forms;
use Filament\Tables;
use App\Models\Lapor;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Services\LaporForm;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

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
                    // ->slideOver()
                    ->label('Buat Laporan Baru')
                    ->model(Lapor::class)
                    ->form(LaporForm::schema())
            ])
            ->emptyStateHeading('Belum Ada Laporan')
            ->emptyStateIcon('heroicon-m-chat-bubble-left-right');
    }
}
