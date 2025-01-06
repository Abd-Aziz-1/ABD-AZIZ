<?php

namespace App\Filament\Resources\AlumniProgramStudiResource\Pages;

use App\Filament\Resources\AlumniProgramStudiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumniProgramStudi extends EditRecord
{
    protected static string $resource = AlumniProgramStudiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
