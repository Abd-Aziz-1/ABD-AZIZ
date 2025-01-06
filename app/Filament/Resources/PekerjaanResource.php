<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PekerjaanResource\Pages;
use App\Filament\Resources\PekerjaanResource\RelationManagers;
use App\Models\Pekerjaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PekerjaanResource extends Resource
{
    protected static ?string $model = Pekerjaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('alumni_id')
                ->relationship('alumni', 'nama')
                ->required()
                ->label('Alumni'),
            Forms\Components\TextInput::make('nama_pekerjaan')
                ->required()
                ->maxLength(255)
                ->label('Nama Pekerjaan'),
            Forms\Components\TextInput::make('instansi')
                ->maxLength(255)
                ->label('Instansi'),
            Forms\Components\TextInput::make('tahun_mulai')
                ->numeric()
                ->required()
                ->label('Tahun Mulai'),
            Forms\Components\TextInput::make('tahun_selesai')
                ->numeric()
                ->nullable()
                ->label('Tahun Selesai'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('alumni.nama')->label('Alumni'),
            Tables\Columns\TextColumn::make('nama_pekerjaan')->label('Nama Pekerjaan')->searchable(),
            Tables\Columns\TextColumn::make('instansi')->label('Instansi')->searchable(),
            Tables\Columns\TextColumn::make('tahun_mulai')->label('Tahun Mulai')->sortable(),
            Tables\Columns\TextColumn::make('tahun_selesai')->label('Tahun Selesai')->sortable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPekerjaans::route('/'),
            'create' => Pages\CreatePekerjaan::route('/create'),
            'edit' => Pages\EditPekerjaan::route('/{record}/edit'),
        ];
    }
}
