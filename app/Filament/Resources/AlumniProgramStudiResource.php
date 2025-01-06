<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniProgramStudiResource\Pages;
use App\Models\AlumniProgramStudi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AlumniProgramStudiResource extends Resource
{
    protected static ?string $model = AlumniProgramStudi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('alumni_id')
                ->relationship('alumni', 'nama')
                ->label('Alumni')
                ->required(),
            Forms\Components\Select::make('program_studi_id')
                ->relationship('programStudi', 'nama_program')
                ->label('Program Studi')
                ->required(),
            Forms\Components\TextInput::make('tahun_masuk')
                ->label('Tahun Masuk')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('tahun_keluar')
                ->label('Tahun Keluar')
                ->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alumni.nama')->label('Alumni'),
                Tables\Columns\TextColumn::make('programStudi.nama_program')->label('Program Studi'),
                Tables\Columns\TextColumn::make('tahun_masuk')->label('Tahun Masuk'),
                Tables\Columns\TextColumn::make('tahun_keluar')->label('Tahun Keluar'),
            ])
            ->filters([
                // Tambahkan filter jika dibutuhkan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relation managers jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlumniProgramStudis::route('/'),
            'create' => Pages\CreateAlumniProgramStudi::route('/create'),
            'edit' => Pages\EditAlumniProgramStudi::route('/{record}/edit'),
        ];
    }
}
