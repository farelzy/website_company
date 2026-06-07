<?php

namespace App\Filament\Resources\Armadas;

use App\Filament\Resources\Armadas\Pages\CreateArmada;
use App\Filament\Resources\Armadas\Pages\EditArmada;
use App\Filament\Resources\Armadas\Pages\ListArmadas;
use App\Filament\Resources\Armadas\Schemas\ArmadaForm;
use App\Filament\Resources\Armadas\Tables\ArmadasTable;
use App\Models\Armada;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArmadaResource extends Resource
{
    protected static ?string $model = Armada::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ArmadaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArmadasTable::configure($table);
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
            'index' => ListArmadas::route('/'),
            'create' => CreateArmada::route('/create'),
            'edit' => EditArmada::route('/{record}/edit'),
        ];
    }
}
