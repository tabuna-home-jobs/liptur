<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Orchid\Press\Models\Category;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\UploadField;
use Orchid\Screen\Fields\DateTimerField;
use Orchid\Screen\Fields\SelectField;
use Orchid\Screen\Fields\CheckBoxField;
use App\Models\Term;
use Orchid\Press\Models\Taxonomy;


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
        $model->load(['attachment', 'tags', 'taxonomies']);
        $model->categories = $model->taxonomies->map(function ($item) {
            return $item->id;
        })->toArray();

        return $model;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function save(Model $model)
    {
        $model->save();
        $model->setTags(request('tags', []));
        $model->taxonomies()->syncWithoutDetaching(request('categories', []));
        $model->attachment()->syncWithoutDetaching(request('attachment', []));
    }

    private function getCategories() {
        return Category::all();
    }
    
   /**
     * Registered fields for main.
     *
     * @return array
     * @throws \Throwable|\Orchid\Press\Exceptions\EntityTypeException
     */
    public function main(): array
    {
        $terms = $this->getCategories()->reduce(function ($acc, $item) {
            $acc[$item->id] = $item->term->getContent('name');
            return $acc;
        }, []);

        return [
            InputField::make('slug')
                ->type('text')
                ->name('slug')
                ->max(255)
                ->title(__('Semantic URL'))
                ->placeholder(__('Unique name')),
            DateTimerField::make('publish_at')
                ->title(__('Time of publication')),
            SelectField::make('status')
                ->options($this->status())
                ->title(__('Status')),
            SelectField::make('categories.')
                ->options($terms)
                ->multiple()
                ->title(__('Category')),
           TagsField::make('tags')
                ->title('Tags')
                ->help('Keywords'),
            UploadField::make('attachment')
                ->title('Upload DropBox'),
        ];
    }

    public function getIconOptions() {
        $icons = collect(config('icon.attributes'))->sort();

        $option=[];
        foreach ($icons as $key=>$icon) {
            $option[]=CheckBoxField::make('option.'.$key)
                ->placeholder($icon)
                ->horizontal();
        }

        return Field::group([
            $option,
        ]);
    }
}
