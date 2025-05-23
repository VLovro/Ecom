<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('product_id')
                ->label('Product ID')
                ->numeric()
                ->readOnly()
                ->required(),

                Forms\Components\TextInput::make('quantity')
                ->label('Quantity')
                ->numeric()
                ->readOnly()
                ->required(),

                Forms\Components\TextInput::make('price')
                ->label('Price')
                ->numeric()
                ->readOnly()
                ->prefix('$')
                ->required(),

                Forms\Components\TextInput::make('size_id')
                ->label('Size ID')
                ->numeric()
                ->readOnly()
                ->nullable(), 

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('product_id')
            ->columns([
                Tables\Columns\TextColumn::make('product.product_name')
                ->label('Product Name')
                ->sortable()
                ->searchable(),

                Tables\Columns\TextColumn::make('price')
                ->label('Price')
                ->money()
                ->sortable(),

                Tables\Columns\TextColumn::make('quantity')
                ->label('Quantity')
                ->numeric()
                ->sortable(),

                 Tables\Columns\TextColumn::make('size.label')
                ->label('Size')
                ->sortable()
                ->searchable()
                ->formatStateUsing(fn (?string $state) => $state ? $state : 'N/A'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\BulkActionGroup::make([
                  //  Tables\Actions\DeleteBulkAction::make(),
               // ]),
            ]);
    }
}
