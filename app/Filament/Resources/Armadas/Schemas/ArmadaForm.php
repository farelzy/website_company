<?php

namespace App\Filament\Resources\Armadas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArmadaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Nama Bus'),
                \Filament\Forms\Components\Select::make('type')
                    ->options([
                        'Big Bus' => 'Big Bus',
                        'Medium Bus' => 'Medium Bus',
                        'Mini Bus / Hiace' => 'Mini Bus / Hiace',
                        'Premium Class' => 'Premium Class'
                    ])
                    ->label('Tipe Bus')
                    ->nullable(),
                TextInput::make('capacity')
                    ->required()
                    ->label('Kapasitas (e.g. 40-60 Seat)'),
                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Detail')
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->disk('public')
                    ->image()
                    ->maxSize(2048)
                    ->label('Foto Bus'),
                TextInput::make('price_label')
                    ->label('Label Harga (e.g. Mulai Rp 3.500.000/hari)'),
                TagsInput::make('features')
                    ->label('Fitur (tekan Enter setelah tiap fitur)')
                    ->placeholder('Tambah fitur...')
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->label('Urutan Tampil'),
                Toggle::make('is_active')
                    ->required()
                    ->label('Aktif'),
            ]);
    }
}
