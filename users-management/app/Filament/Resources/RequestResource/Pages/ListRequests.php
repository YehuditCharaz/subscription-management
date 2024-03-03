<?php

namespace App\Filament\Resources\RequestResource\Pages;

use App\Filament\Resources\RequestResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListRequests extends ListRecords
{
    protected static string $resource = RequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('switchView')
                ->label(__('change view'))
                ->url(fn () => request()->input('viewType', 'Table') === 'Table' ? url()->current().'?viewType=Card' : url()->current().'?viewType=Table')
                ->visible(auth()->user()->role === 'Admin'),
        ];
    }
}
