<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                RichEditor::make('content')
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->disk('public')
                    ->image()
                    ->maxSize(2048),
                \Filament\Forms\Components\Select::make('user_id')
                    ->relationship('author', 'name')
                    ->label('Penulis / Author')
                    ->default(fn () => auth()->id())
                    ->required(),
                Toggle::make('is_published')
                    ->required(),
                DateTimePicker::make('published_at'),
                TextInput::make('meta_title'),
                TextInput::make('meta_description'),
                TextInput::make('meta_keywords'),
            ]);
    }
}
