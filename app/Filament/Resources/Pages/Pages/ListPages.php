<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\PageResource;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;
use Filament\Notifications\Notification;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('reset_to_default')
                ->label('Reset to Default')
                ->color('danger')
                ->icon('heroicon-o-exclamation-triangle')
                ->requiresConfirmation()
                ->modalHeading('Reset to Default Pages')
                ->modalDescription('Peringatan: Semua halaman saat ini akan dihapus dan dikembalikan ke 4 halaman standar Sewa Bus. Lanjutkan?')
                ->action(function () {
                    Artisan::call('db:seed', ['--class' => 'DefaultWebSeeder']);
                    Notification::make()
                        ->title('Berhasil di-reset!')
                        ->success()
                        ->send();
                }),
        ];
    }
}
