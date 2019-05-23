<?php

declare(strict_types=1);

namespace App\Http\Layouts\ShopCategory;

use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\SelectField;
use Orchid\Screen\Fields\TinyMCEField;
use Orchid\Screen\Fields\PictureField;
use App\Models\Master;
use App\Models\Region;

class ShopMastersEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return array
     * @throws \Throwable
     */
    public function fields(): array
    {
        $categoryContent = 'category.term.content.'.app()->getLocale();
//dd($categoryContent);
        return [           

            InputField::make('category.fio')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Фамилия Имя Отчество'))
                ->placeholder(__('Фамилия Имя Отчество'))
                ->help(__('Фамилия Имя Отчество')),
				
			PictureField::make('category.photo')
                ->title('Фотография мастера')
                ->help('Изображение мастера')
                ->width(400)
                ->height(400),

            InputField::make('category.contacts')
                ->type('text')
				->required()
                ->mask('(999) 999-9999')
                ->title(__('Телефон')),
						    	
			SelectField::make('category.remeslo')
			    ->required()
                ->options(function () {
                    $options = $this->query->getContent('catselectShop');

                    return array_replace([0=> __('Выберите ремесло')], $options);
                })
                ->title(__('Ремесло')),
				

            SelectField::make('category.region_id')
			    ->required()
                ->options(function () {
                    $options = $this->query->getContent('catselect');

                    return array_replace([0=> __('Район не указан')], $options);
                })
                ->title(__('Район мастера')),

            TinyMCEField::make('category.description')
			    ->required()
                ->title(__('Description'))
				->entity_encoding('raw')
				->forced_root_block('false')
				//->valid_children(',-p')
                ->theme('modern'),

        ];
    }
}
