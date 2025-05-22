<?php

namespace App\Filament\Resources\LeaveMasterResource\Pages;

use App\Filament\Resources\LeaveMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLeaveMaster extends CreateRecord
{
    protected static string $resource = LeaveMasterResource::class;


    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['leave_taken'] = 0;
        return $data;
    }
}
