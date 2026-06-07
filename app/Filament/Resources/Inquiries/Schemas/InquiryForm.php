<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')->label('Nama Pengirim')->readOnly(),
                \Filament\Forms\Components\TextInput::make('phone')->label('Nomor WA')->readOnly(),
                \Filament\Forms\Components\TextInput::make('bus_type')->label('Jenis Bus')->readOnly(),
                \Filament\Forms\Components\DatePicker::make('departure_date')->label('Tgl Keberangkatan')->readOnly(),
                \Filament\Forms\Components\Textarea::make('message')->label('Pesan')->readOnly()->columnSpanFull(),
            ]);
    }
}
