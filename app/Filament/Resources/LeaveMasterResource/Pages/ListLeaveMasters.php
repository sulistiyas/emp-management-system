<?php

namespace App\Filament\Resources\LeaveMasterResource\Pages;

use App\Filament\Resources\LeaveMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLeaveMasters extends ListRecords
{
    protected static string $resource = LeaveMasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
