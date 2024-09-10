<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProductPurchase;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductPurchaseResource\Pages;
use App\Filament\Resources\ProductPurchaseResource\RelationManagers;

class ProductPurchaseResource extends Resource
{
    protected static ?string $model = ProductPurchase::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'carts';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\Components\Select::make('product_id')
                    ->label('Product')
                    ->relationship('product', 'nama_product')
                    ->required(),
                    
                Forms\Components\Select::make('user_id')
                    ->label('user yang membeli')
                    ->relationship('user', 'name')
                    ->required(),
                
                Forms\Components\TextInput::make('qty')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make('product.nama_product') 
                    ->label('Product Name') 
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name') 
                    ->label('user yang membeli') 
                    ->sortable(),
                Tables\Columns\TextColumn::make('qty')
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
                // Filter berdasarkan user yang login
                Tables\Filters\Filter::make('user')
                    ->form([
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->required(),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['user_id'])) {
                            $query->where('user_id', $data['user_id']);
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // Tambahkan aksi View
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), 
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
            'index' => Pages\ListProductPurchases::route('/'),
            'create' => Pages\CreateProductPurchase::route('/create'),
            'edit' => Pages\EditProductPurchase::route('/{record}/edit'),
        ];
    }
}
