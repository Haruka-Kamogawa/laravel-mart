<?php

namespace App\Filament\Resources\MajorCategories\Pages;

use App\Filament\Resources\MajorCategories\MajorCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMajorCategories extends ListRecords
{
    protected static string $resource = MajorCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
