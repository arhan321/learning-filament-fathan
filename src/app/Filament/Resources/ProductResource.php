<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    
    protected static ?string $model = Product::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Product management';

    protected static ?string $recordTitleAttribute = 'name';

    // protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_product')
                    ->required()
                    ->maxLength(255)
                    ->reactive() 
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state)); 
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->disabled() 
                    ->dehydrated(), 
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('category')
                    ->required()
                    ->maxLength(255),
                    // ->columnSpanFull(),
                Forms\Components\TextInput::make('harga')
                    ->required()
                    ->prefix('Rp')
                    ->numeric(),
                Forms\Components\TextInput::make('stok')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('gambar') 
                    ->image() 
                    ->directory('products/images') 
                    ->maxSize(2048)
                    ->required(),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    // ->primary()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_product')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stok')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('category')
                    ->colors([
                        'primary', 
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->numeric()
                    ->prefix('Rp. ')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('gambar') 
                    ->disk('public') 
                    ->width(50)
                    ->height(50),
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
                Tables\Actions\ViewAction::make(), // Tambahkan aksi View
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tambahkan aksi Delete
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}