<?php

namespace App\Filament\Resources\DataJorongResource\Pages;

use App\Filament\Resources\DataJorongResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataJorong extends EditRecord
{
  protected static string $resource = DataJorongResource::class;

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
