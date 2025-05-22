<?php

namespace App\Filament\Resources\LeaveListResource\Pages;

use App\Filament\Resources\LeaveListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLeaveList extends EditRecord
{
    protected static string $resource = LeaveListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
