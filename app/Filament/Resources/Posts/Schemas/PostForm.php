<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Category;
use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('content')
                    ->required()
                    ->rows(10),
                
                Select::make('category_id')
                    ->label('Category')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->required(),
                
                Select::make('user_id')
                    ->label('Author')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required(),
                
                Toggle::make('is_published')
                    ->label('Published')
                    ->default(false),
            ]);
    }
}
