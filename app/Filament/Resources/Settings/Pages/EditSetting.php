<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        \Illuminate\Support\Facades\Log::info('mutate save', $data);
        $type = $data['type'] ?? $this->record->type;

        if ($type === 'image') {
            if (array_key_exists('value_image', $data)) {
                $val = $data['value_image'];
                $data['value'] = is_array($val) ? (array_values($val)[0] ?? null) : $val;
            }
        } else {
            if (array_key_exists('value_text', $data)) {
                $data['value'] = $data['value_text'];
            }
        }

        unset($data['value_image'], $data['value_text']);

        return $data;
    }
}
