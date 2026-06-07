<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required()
                    ->readOnly()
                    ->helperText('Slug otomatis tidak dapat diubah.'),
                TextInput::make('title'),
                TextInput::make('subtitle'),
                FileUpload::make('banner_image_path')
                    ->disk('public')
                    ->image()
                    ->maxSize(2048),
                RichEditor::make('content')
                    ->columnSpanFull(),
                TextInput::make('meta_title'),
                TextInput::make('meta_description'),
                TextInput::make('meta_keywords'),

                Select::make('template')
                    ->options([
                        'default' => 'Default (Halaman Standar)',
                        'home'    => 'Home (Beranda)',
                        'about'   => 'Tentang Kami',
                        'armada'  => 'Armada & Galeri',
                        'kontak'  => 'Kontak',
                    ])
                    ->default('default')
                    ->required()
                    ->live(),

                \Filament\Schemas\Components\Section::make('Tentang Kami (Visi, Misi, Nilai)')
                    ->schema([
                        Textarea::make('extra_data.visi')
                            ->label('Visi')
                            ->rows(3),
                        Textarea::make('extra_data.misi')
                            ->label('Misi')
                            ->rows(3),
                        Textarea::make('extra_data.nilai')
                            ->label('Nilai')
                            ->rows(3),
                    ])
                    ->visible(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('template') === 'about')
                    ->columnSpanFull(),

                \Filament\Schemas\Components\Section::make('Informasi Kontak')
                    ->schema([
                        TextInput::make('extra_data.whatsapp_number')
                            ->label('Nomor WhatsApp (Gunakan format 628xxx)')
                            ->required(),
                        TextInput::make('extra_data.contact_phone')
                            ->label('Teks Telepon / WA (Untuk Tampilan)'),
                        TextInput::make('extra_data.contact_email')
                            ->label('Email'),
                        TextInput::make('extra_data.contact_address')
                            ->label('Alamat Lengkap'),
                        TextInput::make('extra_data.contact_hours')
                            ->label('Jam Operasional'),
                        Textarea::make('extra_data.google_maps_embed')
                            ->label('Embed URL Google Maps (URL dari iframe src)')
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->visible(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('template') === 'kontak')
                    ->columnSpanFull(),
            ]);
    }
}
