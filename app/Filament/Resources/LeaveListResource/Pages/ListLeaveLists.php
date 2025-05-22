<?php

namespace App\Filament\Resources\LeaveListResource\Pages;

use App\Filament\Resources\LeaveListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLeaveLists extends ListRecords
{
    protected static string $resource = LeaveListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
