<?php

namespace App\Filament\Resources\DataNagariResource\Pages;

use App\Filament\Resources\DataNagariResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataNagari extends EditRecord
{
  protected static string $resource = DataNagariResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\DeleteAction::make(),
    ];
  }

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
