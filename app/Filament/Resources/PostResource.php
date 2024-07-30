<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        // return $form
        //     ->schema([
        //         Forms\Components\Grid::make(1)
        //             ->schema([
        //                 Forms\Components\Grid::make(2)
        //                     ->schema([
        //                         Forms\Components\TextInput::make('title')
        //                             ->required()
        //                             ->maxLength(2048)
        //                             ->reactive()
        //                             ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state))),
        //                         Forms\Components\TextInput::make('slug')
        //                             ->required()
        //                             ->maxLength(2048),
        //                     ]),
        //                 Forms\Components\FileUpload::make('thumbnail'),
        //                 Forms\Components\FileUpload::make('featured_image'),
        //                 Forms\Components\RichEditor::make('body')
        //                     ->required()
        //                     ->columnSpanFull(),
        //                 Forms\Components\Toggle::make('active')
        //                     ->required(),
        //                 Forms\Components\DateTimePicker::make('publisted_at'),
        //                 Forms\Components\Select::make('category_id')
        //                     ->multiple()
        //                     ->relationship('categories', 'title')
        //                     ->required(),
        //             ])
        //     ]);


        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                        Forms\Components\RichEditor::make('body')
                            ->required()
                            ->columnSpan('full'),

                        Forms\Components\Select::make('category_id')
                            ->multiple()
                            ->relationship('categories', 'title')
                            ->searchable()
                            ->required(),

                    Forms\Components\DateTimePicker::make('published_at')
                            ->label('Published Date'),

                    ])
                    ->columns(2),

                Forms\Components\Section::make('Thumbnail')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->image()
                            ->disk('public')
                            ->directory('uploads')
                            ->hiddenLabel(),


                    ])
                    ->collapsible(),
                Forms\Components\Section::make('Featured_image')
                    ->schema([
                        Forms\Components\FileUpload::make('featured_image')
                            ->image()
                            ->disk('public')
                            ->directory('uploads')
                            ->hiddenLabel(),


                ])
                ->collapsible(),
                Forms\Components\Toggle::make('active')
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}