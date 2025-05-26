<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->placeholder('email')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->required()
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create'),
                Forms\Components\Select::make('roles')
                    ->prefixIcon('heroicon-o-bolt')
                    ->label('Role')
                    ->multiple()
                    ->preload()
                    ->relationship('roles', 'name')
                    ->searchable(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user')
                    ->onColor('success')
                    ->offColor('danger')
                    ->inline(false)
                    ->default(true)
                    ->afterStateUpdated(function ($state, $record) {
                        if ($record) {
                            $record->update(['is_active' => $state]);
                        }
                    }),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->copyable()
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('roles.name')
                    ->badge()
                    ->color(function (string $state): string {
                        return match ($state) {
                            'super_admin' => 'danger',
                            'petugas' => 'success',
                            default => 'gray',
                        };
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status User')
                    ->boolean()
                    ->action(function ($record, $column) {
                        if (!auth()->user()->hasRole(['super_admin'])) {
                            Notification::make()
                                ->title("Hanya Super Admin yang dapat mengubah status user")
                                ->danger()
                                ->send();
                            return;
                        }

                        $name = $record->name;
                        $record->update(['is_active' => !$record->is_active]);
                        Notification::make()
                            ->title($record->is_active ? "User $name telah diaktifkan" : "User $name telah dinonaktifkan")
                            ->success()
                            ->send();
                    })
                    ->visible(fn() => auth()->user()->hasAnyRole(['super_admin'])),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return cache()->remember('user_count_' . auth()->id(), 300, function () {
            $query = static::getEloquentQuery();

            if (auth()->user()->hasRole('super_admin')) {
                return $query->count();
            }

            // Menggunakan whereHas untuk filter berdasarkan relasi teams
            return $query->whereHas('teams', function ($q) {
                $q->where('teams.id', auth()->user()->teams->first()?->id);
            })->count();
        });
    }
}
