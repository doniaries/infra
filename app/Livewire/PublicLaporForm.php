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
use Filament\Forms\Components\Actions\Action;

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
                            ->hint('Harap Dicatat Untuk Cek Status Laporan!')
                            ->hintColor('danger')
                            ->default(fn() => Str::random(5))
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
                            ->createOptionAction(
                                fn(Action $action) => $action
                                    ->form([
                                        TextInput::make('nama')
                                            ->label('Nama OPD')
                                            ->required()
                                            ->maxLength(255)
                                    ])
                                    ->action(function (array $data) {
                                        $opd = Opd::create($data);

                                        $this->form->fill([
                                            'opd_id' => $opd->id
                                        ]);
                                    })
                            )
                            ->createOptionModalHeading('Tambah OPD Baru')
                            ->placeholder('Pilih atau tambah OPD baru'),
                        // Tambahkan ini

                        Select::make('jenis_laporan')
                            ->options([
                                'Laporan Gangguan' => 'Laporan Gangguan',
                                'Koordinasi Teknis' => 'Koordinasi Teknis',
                            ])
                            ->default('Laporan Gangguan')
                            ->required(),
                        // Tambahkan ini

                        Textarea::make('uraian_laporan')
                            ->label('Uraian Laporan')
                            ->required()
                            ->rows(5), // Tambahkan ini


                        FileUpload::make('file_laporan')
                            ->label('Lampiran')
                            ->directory('public/laporan')
                            ->maxSize(5120)
                            ->acceptedFileTypes(['application/pdf', 'image/*']),

                    ])
                    ->columns(2) // Ubah ini dari 1 menjadi 12
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $lapor = Lapor::create([
            ...$data,
            'status_laporan' => 'Belum Diproses',
            'keterangan_petugas' => 'Belum ada keterangan',
        ]);

        Notification::make()
            ->success()
            ->title('Laporan Berhasil Dikirim')
            ->body("Nomor tiket Anda: {$lapor->no_tiket}")
            ->send();

        $this->form->fill();
        redirect()->route('list.laporan');
    }

    public function render(): View
    {
        return view('livewire.public-lapor-form');
    }
}
