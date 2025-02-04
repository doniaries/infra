<?php

namespace App\Filament\Resources\LaporResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\DB;
use App\Filament\Resources\LaporResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords\Tab;

class ListLapors extends ListRecords
{
    protected static string $resource = LaporResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $counts = $this->getStatusCounts();
        return [
            'semua' => Tab::make('Semua')
                ->icon('heroicon-o-arrow-path-rounded-square')
                ->badgeColor('primary')
                ->badge($counts['semua']),
            'belum diproses' => Tab::make('Belum Diproses ')
                ->icon('heroicon-o-bolt-slash')
                ->badgeColor('danger')
                ->badge($counts['belum_diproses'])
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status_laporan', 'belum diproses')),
            'sedang diproses' => Tab::make('Sedang Diproses ')
                ->icon('heroicon-o-bolt')
                ->badgeColor('warning')
                ->badge($counts['sedang_diproses'])
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status_laporan', 'sedang diproses')),
            'selesai diproses' => Tab::make('Selesai Diproses ')
                ->icon('heroicon-o-check-circle')
                ->badgeColor('success')
                ->badge($counts['selesai_diproses'])
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status_laporan', 'selesai diproses')),
        ];
    }

    protected function getStatusCounts(): array
    {
        return [
            'semua' => DB::table('lapors')->count(),
            'belum_diproses' => DB::table('lapors')->where('status_laporan', 'belum diproses')->count(),
            'sedang_diproses' => DB::table('lapors')->where('status_laporan', 'sedang diproses')->count(),
            'selesai_diproses' => DB::table('lapors')->where('status_laporan', 'selesai diproses')->count(),
        ];
    }
}