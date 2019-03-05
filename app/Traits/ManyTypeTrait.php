<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\UploadField;

/**
 * Trait ManyTypeTrait.
 */
trait ManyTypeTrait
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(Model $model) : Model
    {
        return $model->load(['attachment', 'tags']);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function save(Model $model)
    {
        $model->save();

        $model->setTags(request('tags', []));
        $model->attachment()->syncWithoutDetaching(request('attachment', []));
    }

    /**
     * @return array
     * @throws \Orchid\Screen\Exceptions\TypeException
     * @throws \Throwable
     */
    public function main(): array
    {
        return array_merge(parent::main(), [

            TagsField::make('tags')
                ->title('Tags')
                ->help('Keywords'),
            UploadField::make('attachment')
                ->title('Upload DropBox'),
        ]);
    }
    
    
   /**
     * Registered fields for main.
     *
     * @return array
     * @throws \Throwable|\Orchid\Press\Exceptions\EntityTypeException
     */
    public function main(): array
    {
        return [
            Input::make('slug')
                ->type('text')
                ->name('slug')
                ->required()
                ->max(255)
                ->title(__('Semantic URL'))
                ->placeholder(__('Unique name')),
            DateTimer::make('publish_at')
                ->title(__('Time of publication')),
            Select::make('status')
                ->options($this->status())
                ->title(__('Status')),
        ];
    }
}
