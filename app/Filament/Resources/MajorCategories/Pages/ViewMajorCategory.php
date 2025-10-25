<?php

namespace App\Filament\Resources\MajorCategories\Pages;

use App\Filament\Resources\MajorCategories\MajorCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMajorCategory extends ViewRecord
{
    protected static string $resource = MajorCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
