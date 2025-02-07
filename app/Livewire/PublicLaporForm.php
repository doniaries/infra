<?php

namespace App\Livewire;

use App\Models\Opd;
use App\Models\Lapor;
use Livewire\Component;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Livewire\WithFileUploads;

class PublicLaporForm extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Form Pengaduan')
                ->description('Silakan isi form pengaduan di bawah ini')
                ->schema([
                    TextInput::make('nama_pelapor')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    Select::make('opd_id')
                        ->label('OPD')
                        ->options(Opd::pluck('nama', 'id'))
                        ->searchable()
                        ->preload()
                        ->required(),

                    Select::make('jenis_laporan')
                        ->options([
                            'Laporan Gangguan' => 'Laporan Gangguan',
                            'Koordinasi Teknis' => 'Koordinasi Teknis',
                        ])
                        ->default('Laporan Gangguan')
                        ->required(),

                    Textarea::make('uraian_laporan')
                        ->label('Uraian Laporan')
                        ->required(),

                    FileUpload::make('file_laporan')
                        ->label('Lampiran')
                        ->directory('public/laporan')
                        ->maxSize(5120)
                        ->acceptedFileTypes(['application/pdf', 'image/*']),
                ])
        ];
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $data['no_tiket'] = Str::random(5);
        $data['tgl_laporan'] = now();
        $data['status_laporan'] = 'Belum Diproses';
        $data['keterangan_petugas'] = 'Belum ada keterangan';

        $lapor = Lapor::create($data);

        Notification::make()
            ->success()
            ->title('Laporan Berhasil Dikirim')
            ->body("Nomor tiket Anda: {$lapor->no_tiket}")
            ->send();

        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.public-lapor-form')
            ->layout('layouts.guest');
    }
}
