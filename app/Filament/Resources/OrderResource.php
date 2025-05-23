<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model; 

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Order Details')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('order_number')
                    ->label('Order Number')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255)
                    ->readOnly(),

                    Forms\Components\TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->numeric()
                    ->required()
                    ->prefix('$')
                    ->readOnly(),

                    Forms\Components\Select::make('payment_method')
                    ->label('Payment Method')
                    ->options([
                                'On Delivery' => 'On Delivery',
                                'credit_card' => 'Credit Card',
                            ])
                    ->required(),
                  
                    
                    Forms\Components\TextInput::make('user_id')
                    ->label( 'User ID')
                    ->readOnly()
                    ->formatStateUsing(fn (?string $state) => $state ? $state : 'Guest'), 
                    ]),
                    
            Forms\Components\Section::make('Shipping information')
            ->columns(2)
            ->schema([
                Forms\Components\TextInput::make('shipping_full_name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(255)
                    ->readOnly(),

                Forms\Components\TextInput::make('shipping_email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->readOnly(),

                Forms\Components\TextInput::make('shipping_address_line1')
                    ->label('Address Line 1')
                    ->required()
                    ->maxLength(255)
                    ->readOnly(),
                
                Forms\Components\TextInput::make('shipping_address_line2')
                    ->label('Address Line 2 (Optional)')
                    ->nullable()
                    ->maxLength(255)
                    ->readOnly(),

                Forms\Components\TextInput::make('shipping_city')
                    ->label('City')
                    ->required()
                    ->maxLength(255)
                    ->readOnly(),

                Forms\Components\TextInput::make('shipping_state_province')
                    ->label('State / Province (Optional)')
                    ->nullable()
                    ->maxLength(255)
                    ->readOnly(),

                Forms\Components\TextInput::make('shipping_zip_postal_code')
                    ->label('Zip / Postal Code')
                    ->required()
                    ->maxLength(20)
                    ->readOnly(),

                Forms\Components\TextInput::make('shipping_country')
                    ->label('Country')
                    ->required()
                    ->maxLength(255)
                     ->readOnly(),

            ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                ->label('Order Number')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('total_amount')
                ->label('Total Amount')
                ->money()
                ->sortable(),

                Tables\Columns\TextColumn::make('payment_method')
                ->label('Payment Method')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('shipping_full_name')
                ->label('Customer Name')
                ->searchable(),

                
                Tables\Columns\TextColumn::make('shipping_email')
                ->label('Customer Email')
                ->searchable(),

                
                Tables\Columns\TextColumn::make('created_at')
                ->label('Order Date')
                ->dateTime() 
                ->sortable(),
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
            RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'), 
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool {
        return false;
    }

      public static function canDeleteAny(): bool {
        return false;
    }

        public static function canEdit(Model $record): bool {
        return false;
    }
}
