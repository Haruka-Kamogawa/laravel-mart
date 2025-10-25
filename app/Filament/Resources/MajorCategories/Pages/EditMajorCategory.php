<?php

namespace App\Filament\Resources\MajorCategories\Pages;

use App\Filament\Resources\MajorCategories\MajorCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMajorCategory extends EditRecord
{
    protected static string $resource = MajorCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
