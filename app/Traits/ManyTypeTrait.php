<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Orchid\Press\Models\Category;
use Orchid\Screen\Fields\TagsField;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\UploadField;
use Orchid\Screen\Fields\DateTimerField;
use Orchid\Screen\Fields\SelectField;
use Orchid\Screen\Fields\CheckBoxField;
use Orchid\Screen\Fields\LabelField;
use App\Models\Post;


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
        if($model->exists()) {
            $attrs = $model->getAttributes();
            $model = new Post;
            $model->fill($attrs);
        }

        $content=request('content', []);
        foreach (['ru','en'] as $locale) {
            if (isset($content[$locale]['keywords'])) {
                if (is_array($content[$locale]['keywords'])) {
                    $content[$locale]['keywords'] = implode(", ", $content[$locale]['keywords']);
                }
            }
        }
        $model->content=$content;

        foreach (request('options.option', []) as $key => $value) {
            $option[$key] = '1';
        }
        if (isset($option)) {
            $model->options=array_merge($model->options,['option' => $option]);
        }
        foreach (request('options.category', []) as $key => $value) {
            $category[$key] = '1';
        }
        if (isset($category)) {
            $model->options=array_merge($model->options,['category' => $category]);
        }

        $model->save();
        $model->setTags(request('tags', []));

        $model->taxonomies()->sync(array_flatten(request('categories', [])));
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

        $options=[];
        foreach ($icons as $key=>$icon) {
            $options[]=CheckBoxField::make('option.'.$key)
                ->placeholder($icon)
                ->horizontal();
        }

        return [
            LabelField::make('option_label')
                ->hr(),
            LabelField::make('option_label')
                ->title('Опции')
                ->horizontal()
                ->hr(),
            $options,
        ];
    }

    public function getCategoryOptions() {
        $categories = collect(config('category.'.$this->slug.'.category'))->sort();

        $options=[];
        foreach ($categories as $key=>$category) {
            $options[]=CheckBoxField::make('category.'.$key)
                ->placeholder($category)
                ->horizontal();
        }

        return [
            LabelField::make('category_label')
                ->hr(),
            LabelField::make('category_label')
                ->title('Категории')
                ->horizontal()
                ->hr(true),
            $options,
        ];
    }
}
