<?php

namespace App\Filament\Resources\DataJorongResource\Pages;

use App\Filament\Resources\DataJorongResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataJorong extends CreateRecord
{
  protected static string $resource = DataJorongResource::class;

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
