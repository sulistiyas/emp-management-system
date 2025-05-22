<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaveListResource\Pages;
use App\Filament\Resources\LeaveListResource\RelationManagers;
use App\Models\LeaveList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeaveListResource extends Resource
{
    protected static ?string $model = LeaveList::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Leave Management';

    protected static ?string $navigationLabel = 'Leave List';

    protected static ?string $label = 'Leave List';

    protected static ?string $slug = 'leave-list';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_users')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_leave_taken')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\DatePicker::make('leave_start_date'),
                Forms\Components\DatePicker::make('leave_end_date'),
                Forms\Components\TextInput::make('leave_reason')
                    ->maxLength(255),
                Forms\Components\TextInput::make('leave_status')
                    ->required()
                    ->maxLength(255)
                    ->default('pending'),
                Forms\Components\TextInput::make('leave_approval_by')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_users')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_leave_taken')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leave_start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leave_end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leave_reason')
                    ->searchable(),
                Tables\Columns\TextColumn::make('leave_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('leave_approval_by')
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
            'index' => Pages\ListLeaveLists::route('/'),
            'create' => Pages\CreateLeaveList::route('/create'),
            'edit' => Pages\EditLeaveList::route('/{record}/edit'),
        ];
    }
}
