<?php

namespace App\Filament\Resources\MajorCategories;

use App\Filament\Resources\MajorCategories\Pages\CreateMajorCategory;
use App\Filament\Resources\MajorCategories\Pages\EditMajorCategory;
use App\Filament\Resources\MajorCategories\Pages\ListMajorCategories;
use App\Filament\Resources\MajorCategories\Pages\ViewMajorCategory;
use App\Filament\Resources\MajorCategories\Schemas\MajorCategoryForm;
use App\Filament\Resources\MajorCategories\Schemas\MajorCategoryInfolist;
use App\Filament\Resources\MajorCategories\Tables\MajorCategoriesTable;
use App\Models\MajorCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MajorCategoryResource extends Resource
{
    protected static ?string $model = MajorCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MajorCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MajorCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MajorCategoriesTable::configure($table);
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
            'index' => ListMajorCategories::route('/'),
            'create' => CreateMajorCategory::route('/create'),
            // 'view' => ViewMajorCategory::route('/{record}'),
            'edit' => EditMajorCategory::route('/{record}/edit'),
        ];
    }
}
