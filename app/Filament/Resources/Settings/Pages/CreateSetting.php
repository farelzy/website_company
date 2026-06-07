<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $type = $data['type'] ?? 'text';

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
