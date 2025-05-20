<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select; 

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('product_name')
                ->label('Product Name')    
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord : True),
                Forms\Components\Textarea::make('description')
                ->label('Description')    
                ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                ->label('Price')    
                ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\Select::make('gender')
                    ->required()
                    ->label('Gender')
                    ->options([
                    'men' => 'Male',
                    'women' => 'Female',
                    'unisex' => 'Unisex',
                    ])
                    ->native(false),
                Forms\Components\Select::make('brand_id')
                    ->required()
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('team_id')
                    ->label('Team')
                    ->required()
                    ->relationship('team', 'team_name')
                    ->searchable()
                    ->preload(),
                Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->label('Product Image')
                    ->disk('public')
                    ->directory('product-images'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_name')
                ->label('Product Name')    
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('price')
                ->label('Price')    
                ->money()
                ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                ->label('Gender')    
                ->searchable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Brand')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('team.team_name')
                    ->label('Team')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_path')
                ->label('Image')
                ->disk('public'),
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
              RelationManagers\SizesRelationManager::class, 
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
