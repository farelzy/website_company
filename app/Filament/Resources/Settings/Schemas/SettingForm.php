<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('key')
                    ->required(),
                \Filament\Forms\Components\Select::make('type')
                    ->options([
                        'text' => 'Text',
                        'image' => 'Image',
                    ])
                    ->default('text')
                    ->live()
                    ->required(),
                \Filament\Forms\Components\Textarea::make('value_text')
                    ->label('Value')
                    ->columnSpanFull()
                    ->visible(fn ($get) => $get('type') === 'text')
                    ->afterStateHydrated(fn ($component, $state, $record) => $record && $record->type === 'text' ? $component->state($record->value) : null),
                \Filament\Forms\Components\FileUpload::make('value_image')
                    ->label('Value (Image)')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->imageEditorAspectRatios(['1:1'])
                    ->imageCropAspectRatio('1:1')
                    ->directory('settings')
                    ->columnSpanFull()
                    ->visible(fn ($get) => $get('type') === 'image')
                    ->afterStateHydrated(fn ($component, $state, $record) => $record && $record->type === 'image' ? $component->state($record->value) : null),
                \Filament\Forms\Components\TextInput::make('group')
                    ->required()
                    ->default('general'),
                \Filament\Forms\Components\TextInput::make('label')
                    ->required(),
            ]);
    }
}
