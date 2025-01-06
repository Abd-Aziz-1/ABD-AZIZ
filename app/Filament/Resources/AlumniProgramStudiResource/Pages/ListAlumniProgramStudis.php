<?php

namespace App\Filament\Resources\AlumniProgramStudiResource\Pages;

use App\Filament\Resources\AlumniProgramStudiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumniProgramStudis extends ListRecords
{
    protected static string $resource = AlumniProgramStudiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
