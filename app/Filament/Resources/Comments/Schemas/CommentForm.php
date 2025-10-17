<?php

namespace App\Filament\Resources\Comments\Schemas;

use App\Models\Post;
use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('post_id')
                    ->label('Post')
                    ->options(Post::all()->pluck('title', 'id'))
                    ->required(),
                
                Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required(),
                
                Textarea::make('comment')
                    ->required()
                    ->rows(5),
            ]);
    }
}
