<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public function mount(): void
    {
        $user = UserResource::getUserFromAzure();
        abort_unless($user->role === 'Admin', 401);
    }

    public function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Action::make('switchView')
                ->label(__('change view'))
                ->url(fn () => request()->input('viewType', 'Table') === 'Table' ? url()->current().'?viewType=Card' : url()->current().'?viewType=Table'),
        ];
    }
}
