<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaveMasterResource\Pages;
use App\Filament\Resources\LeaveMasterResource\RelationManagers;
use App\Models\LeaveMaster;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeaveMasterResource extends Resource
{
    protected static ?string $model = LeaveMaster::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Leave Management';

    protected static ?string $navigationLabel = 'Leaves';

    protected static ?string $label = 'Leave';

    protected static ?string $slug = 'leave';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Employee Details')
                    ->description('Select Employee Name')
                    ->schema([
                        Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\Select::make('id_users')
                                    ->relationship('user', 'name')
                                    ->required()
                                    ->label('Employee Name')
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('Select User'),
                            ]),
                    ]),
                
                Forms\Components\Section::make('Leave Details')
                    ->description('Leave Details')
                    ->schema([
                        Forms\Components\TextInput::make('leave_allowance')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->maxValue(15),
                        Forms\Components\DatePicker::make('leave_expiry_date')
                            ->required()
                            ->default(now()->addYear())
                            ->minDate(now())
                            ->placeholder('Select Expiry Date'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Employee Name')
                    ->sortable()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leave_allowance')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leave_taken')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leave_input_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leave_expiry_date')
                    ->date()
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
            'index' => Pages\ListLeaveMasters::route('/'),
            'create' => Pages\CreateLeaveMaster::route('/create'),
            'edit' => Pages\EditLeaveMaster::route('/{record}/edit'),
        ];
    }
}
