<?php

namespace App\Filament\Resources\DataJorongResource\Pages;

use App\Filament\Resources\DataJorongResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataJorongs extends ListRecords
{
    protected static string $resource = DataJorongResource::class;

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
