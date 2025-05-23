<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Opd;
use App\Models\Lapor;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Filament\Notifications\Actions\Action;

class PublicLaporForm extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Form Pengaduan')
                    ->columnSpanFull()
                    ->description('Silakan isi form pengaduan di bawah ini')
                    ->schema([
                        DateTimePicker::make('tgl_laporan')
                            ->default(Carbon::now())
                            ->timezone('Asia/Jakarta')
                            ->readOnly()
                            ->required(),

                        TextInput::make('no_tiket')
                            ->prefixIcon('heroicon-o-ticket')
                            ->label('No Tiket')
                            ->hint('Nomor Tiket Harap Dicatat Untuk Cek Status Laporan!')
                            ->hintColor('danger')
                            ->default(function () {
                                do {
                                    $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
                                } while (Lapor::where('no_tiket', $noTiket)->exists());
                                return $noTiket;
                            })
                            ->readOnly(),


                        TextInput::make('nama_pelapor')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        Select::make('opd_id')
                            ->label('OPD')
                            ->options(Opd::pluck('nama', 'id'))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live(),

                        Select::make('jenis_laporan')
                            ->options([
                                'Laporan Gangguan' => 'Laporan Gangguan',
                                'Koordinasi Teknis' => 'Koordinasi Teknis',
                            ])
                            ->default('Laporan Gangguan')
                            ->required(),

                        Textarea::make('uraian_laporan')
                            ->label('Uraian Laporan')
                            ->required()
                            ->rows(5),

                        FileUpload::make('file_laporan')
                            ->label('Lampiran')
                            ->directory('public/laporan')
                            ->maxSize(5120)
                            ->acceptedFileTypes(['application/pdf', 'image/*']),

                    ])
                    ->columns(2)
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        // Ensure no_tiket is unique before creating the record
        do {
            $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
        } while (Lapor::where('no_tiket', $noTiket)->exists());

        $data['no_tiket'] = $noTiket; // Add the generated ticket number to the data

        try {
            $lapor = Lapor::create([
                ...$data,
                'status_laporan' => 'Belum Diproses',
                'keterangan_petugas' => 'Belum ada keterangan',
            ]);

            Notification::make()
                ->success()
                ->title('Laporan Berhasil Dikirim')
                ->body("Nomor tiket Anda: {$lapor->no_tiket}")
                ->duration(3000)
                ->send();

            $this->form->fill(); // Reset form after successful submission
            $this->dispatch('redirect', url: route('list.laporan'));
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Check for duplicate entry error code
                Notification::make()
                    ->danger()
                    ->title('Gagal Mengirim Laporan')
                    ->body('Nomor tiket sudah ada atau terjadi kesalahan. Silakan coba lagi.')
                    ->duration(3000)
                    ->send();
            } else {
                Notification::make()
                    ->danger()
                    ->title('Gagal Mengirim Laporan')
                    ->body('Terjadi kesalahan pada sistem. Silakan coba lagi nanti.')
                    ->duration(3000)
                    ->send();
            }
        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Gagal Mengirim Laporan')
                ->body('Terjadi kesalahan yang tidak diketahui. Silakan coba lagi.')
                ->duration(3000)
                ->send();
        }
    }

    public function render(): View
    {
        return view('livewire.public-lapor-form');
    }
}