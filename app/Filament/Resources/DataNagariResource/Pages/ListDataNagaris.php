<?php

namespace App\Filament\Resources\DataNagariResource\Pages;

use App\Filament\Resources\DataNagariResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataNagaris extends ListRecords
{
    protected static string $resource = DataNagariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            //   \EightyNine\ExcelImport\ExcelImportAction::make()
            //     ->slideOver()
            //     ->color("success"),
        ];
    }
}
