<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required(),
                FileUpload::make('image')
                    ->directory('products')
                    ->visibility('public')
                    ->image()
                    ->maxSize(2048)
                    ->deletable(true)
                    ->downloadable(true),
                Toggle::make('is_recommended')
                    ->label('Recommended')
                    ->inline(false)
                    ->helperText('Check this to display on top page recommendation'),
            ]);
    }
}
