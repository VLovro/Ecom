<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Rules\Unique; 


class CategoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'categories';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                ->label('Category')
                ->relationship('category', 'name')
                ->required()
                ->searchable()
                ->preload()
                 ->unique(ignoreRecord: true, modifyRuleUsing: function (Unique $rule) {
                    return $rule->where('product_id', $this->ownerRecord->id);
                }),
                 
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Category Name')
                ->searchable()
                ->sortable(),

             Tables\Columns\TextColumn::make('group')
                ->label('Category Group') 
                ->searchable() 
                ->sortable(), 

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                 ->form(fn (Forms\Form $form) => $form->schema([
                    Forms\Components\Select::make('recordId')
                        ->label('Category')
                        ->options(
                            \App\Models\Category::query()
                                ->pluck('name', 'id')
                                ->toArray()
                        )
                        ->required()
                        ->searchable()
                        ->preload(),
                ])),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
         
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
