<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Nama Lengkap'),
                \Filament\Tables\Columns\TextColumn::make('username')->searchable()->label('Username'),
                \Filament\Tables\Columns\TextColumn::make('role')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'superadmin' => 'danger',
                        'admin' => 'success',
                        default => 'gray',
                    }),
                \Filament\Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->disabled(fn ($record) => $record->role === 'superadmin'),
            ])
            ->recordActions([
                \Filament\Actions\EditAction::make(),
            ])
            ->toolbarActions([
                // Kosongkan agar tidak ada fitur hapus masal
            ]);
    }
}
