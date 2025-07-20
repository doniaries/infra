<?php

namespace App\Filament\Resources\DataNagariResource\Pages;

use App\Filament\Resources\DataNagariResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataNagari extends CreateRecord
{
  protected static string $resource = DataNagariResource::class;

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
