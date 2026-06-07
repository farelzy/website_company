<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->label('Nama Lengkap'),
                TextInput::make('username')
                    ->unique(ignoreRecord: true)
                    ->label('Username')
                    ->autocomplete('off'),
                TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->label('Email (Opsional)')
                    ->autocomplete('off'),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->label('Password')
                    ->helperText('Kosongkan jika tidak ingin mengubah password.')
                    ->autocomplete('new-password'),
                Select::make('role')
                    ->options([
                        'superadmin' => 'Super Admin',
                        'admin' => 'Admin',
                    ])
                    ->required()
                    ->default('admin'),
                Select::make('gender')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->label('Jenis Kelamin'),
                DatePicker::make('birthdate')
                    ->label('Tanggal Lahir')
                    ->disabled(fn () => auth()->user()->role !== 'superadmin'),
                TextInput::make('phone')
                    ->label('Nomor Telepon (Opsional)')
                    ->disabled(fn () => auth()->user()->role !== 'superadmin'),
                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true)
                    ->disabled(fn ($get) => $get('role') === 'superadmin')
                    ->dehydrated()
                    ->helperText('Jika dimatikan, pengguna tidak bisa login. Superadmin selalu aktif.'),
            ]);
    }
}
