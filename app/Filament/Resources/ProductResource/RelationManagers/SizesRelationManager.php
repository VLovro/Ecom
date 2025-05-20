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
use Filament\Forms\Components\TextInput; 
use Filament\Tables\Filters\SelectFilter; 
use Illuminate\Validation\Rules\Unique; 

class SizesRelationManager extends RelationManager
{

    protected static string $relationship = 'sizes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('size_id')
                    ->label('Size')
                    ->options(
                    \App\Models\Size::query()
                    ->pluck('label', 'id')
                    ->toArray())
                    ->required()
                    ->searchable()
                    ->preload()
                    ->unique(
    ignoreRecord: true,
    modifyRuleUsing: function (Unique $rule) {
        return $rule->where('product_id', $this->ownerRecord->id);
    },
),

                
                Forms\Components\TextInput::make('stock')
                    ->label('Stock for this Size')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('label') 
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->label('Size Label')
                    ->searchable()
                    ->sortable(),

                
                Tables\Columns\TextColumn::make('type')
                    ->label('Size Type')
                    ->searchable()
                    ->sortable(),

                
                Tables\Columns\TextColumn::make('pivot.stock')
                    ->label('Stock')
                    ->numeric()
                    ->sortable(),
            ])
            ->headerActions([
                
                Tables\Actions\AttachAction::make()
                    ->form(fn (Forms\Form $form) => $form->schema([
                        Forms\Components\Select::make('recordId')
                            ->label('Size')
                            ->options(
                                \App\Models\Size::query()
                                    ->pluck('label', 'id')
                                    ->toArray()
                            )
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('stock')
                            ->label('Stock for this Size')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(0),
                    ])),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }

}