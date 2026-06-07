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
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                    ])
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

                \Filament\Schemas\Components\Section::make('Beranda - Keunggulan & Mengapa Pilih Kami')
                    ->schema([
                        \Filament\Forms\Components\Select::make('extra_data.recommended_armadas')
                            ->label('Bus Rekomendasi Kami')
                            ->multiple()
                            ->options(fn () => \App\Models\Armada::pluck('name', 'id'))
                            ->maxItems(3)
                            ->columnSpanFull()
                            ->helperText('Pilih maksimal 3 armada untuk ditampilkan di beranda.'),
                        \Filament\Forms\Components\Repeater::make('extra_data.features')
                            ->label('Keunggulan Singkat (Misal: Tepat Waktu, Aman & Nyaman)')
                            ->schema([
                                TextInput::make('title')->label('Judul')->required(),
                                TextInput::make('description')->label('Deskripsi Pendek')->required(),
                                \Filament\Forms\Components\Select::make('icon')
                                    ->label('Icon')
                                    ->options(function () {
                                        $icons = [
                                            'heroicon-o-truck' => 'Bus / Armada',
                                            'heroicon-o-calendar-days' => 'Kalender / Jadwal',
                                            'heroicon-o-chat-bubble-left-ellipsis' => 'Chat / Komunikasi',
                                            'heroicon-o-phone' => 'Telepon / Kontak',
                                            'heroicon-o-shield-check' => 'Aman / Perlindungan',
                                            'heroicon-o-star' => 'Premium / Unggulan',
                                            'heroicon-o-map' => 'Rute / Peta',
                                            'heroicon-o-clock' => 'Tepat Waktu / Jam',
                                            'heroicon-o-currency-dollar' => 'Harga / Biaya',
                                            'heroicon-o-users' => 'Rombongan / Tim',
                                        ];
                                        $options = [];
                                        foreach ($icons as $key => $label) {
                                            $options[$key] = \Illuminate\Support\Facades\Blade::render('<span style="display:flex; align-items:center; gap:0.5rem;"><x-icon name="' . $key . '" style="width:1.5rem; height:1.5rem; flex-shrink:0;" /> <span>' . $label . '</span></span>');
                                        }
                                        return $options;
                                    })
                                    ->allowHtml()
                                    ->searchable(),
                            ])
                            ->defaultItems(3)
                            ->maxItems(3),
                        \Filament\Forms\Components\Repeater::make('extra_data.why_choose_us')
                            ->label('Mengapa Pilih Kami')
                            ->schema([
                                TextInput::make('title')->label('Alasan')->required(),
                                Textarea::make('description')->label('Penjelasan')->required()->rows(2),
                                \Filament\Forms\Components\Select::make('icon')
                                    ->label('Icon')
                                    ->options(function () {
                                        $icons = [
                                            'heroicon-o-truck' => 'Bus / Armada',
                                            'heroicon-o-calendar-days' => 'Kalender / Jadwal',
                                            'heroicon-o-chat-bubble-left-ellipsis' => 'Chat / Komunikasi',
                                            'heroicon-o-phone' => 'Telepon / Kontak',
                                            'heroicon-o-shield-check' => 'Aman / Perlindungan',
                                            'heroicon-o-star' => 'Premium / Unggulan',
                                            'heroicon-o-map' => 'Rute / Peta',
                                            'heroicon-o-clock' => 'Tepat Waktu / Jam',
                                            'heroicon-o-currency-dollar' => 'Harga / Biaya',
                                            'heroicon-o-users' => 'Rombongan / Tim',
                                        ];
                                        $options = [];
                                        foreach ($icons as $key => $label) {
                                            $options[$key] = \Illuminate\Support\Facades\Blade::render('<span style="display:flex; align-items:center; gap:0.5rem;"><x-icon name="' . $key . '" style="width:1.5rem; height:1.5rem; flex-shrink:0;" /> <span>' . $label . '</span></span>');
                                        }
                                        return $options;
                                    })
                                    ->allowHtml()
                                    ->searchable(),
                            ])
                            ->defaultItems(4)
                            ->maxItems(4),
                    ])
                    ->visible(fn (\Filament\Schemas\Components\Utilities\Get $get) => $get('template') === 'home')
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
