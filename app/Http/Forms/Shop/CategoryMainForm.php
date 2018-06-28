<?php

namespace App\Http\Forms\Shop;

use App\Core\Models\ShopCategory;
use App\Core\Models\Term as AppTerm;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Orchid\Platform\Core\Models\Taxonomy;
use Orchid\Platform\Core\Models\Term;
use Orchid\Platform\Forms\Form;

class CategoryMainForm extends Form
{
    /**
     * @var string
     */
    public $name = 'Information';

    /**
     * Base Model.
     *
     * @var
     */
    protected $model = Taxonomy::class;

    /**
     * CategoryDescForm constructor.
     *
     * @param null $request
     */
    public function __construct($request = null)
    {
        $this->name = trans('dashboard::systems/category.information');
        parent::__construct($request);
    }

    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            //'slug' => 'sometimes|required|max:255|unique:terms,slug,'.$this->request->get('slug').',slug',
        ];
    }

    /**
     * @param Taxonomy|null $termTaxonomy
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function get(Taxonomy $termTaxonomy = null) : View
    {
        $termTaxonomy = $termTaxonomy ?: new $this->model([
            'id' => 0,
        ]);

        $category = ShopCategory::where('id', '!=', $termTaxonomy->id)->get();
        $behavior = new CategoryTemplate();

        return view('dashboard.shop.category.info', [
            'category'     => $category,
            'termTaxonomy' => $termTaxonomy,
            'behavior'     => $behavior,
        ]);
    }

    /**
     * @param Request|null  $request
     * @param Taxonomy|null $termTaxonomy
     *
     * @return mixed|void
     */
    public function persist(Request $request = null, Taxonomy $termTaxonomy = null)
    {
        if (is_null($termTaxonomy)) {
            $termTaxonomy = new $this->model();
        }

        $params = $request->all();
        $params['slug'] = SlugService::createSlug(
            AppTerm::class,
            'slug',
            array_get($params, 'content.ru.name')
        );

        $term = ($request->get('term_id') == 0) ? Term::create($params) : Term::find($request->get('term_id'));
        $term->fill($params);

        $termTaxonomy->fill($params);
        $termTaxonomy->term_id = $term->id;

        $termTaxonomy->save();
        $term->save();

        //$termTaxonomy->term->fill($request->all());
        //$termTaxonomy->term->save();
    }

    /**
     * @param Request  $request
     * @param Taxonomy $termTaxonomy
     *
     * @throws \Exception
     */
    public function delete(Request $request, Taxonomy $termTaxonomy)
    {
        $termTaxonomy->allChildrenTerm()->get()->each(function ($item) {
            $item->update([
                'parent_id' => 0,
            ]);
        });

        $termTaxonomy->term->delete();
        $termTaxonomy->delete();
    }
}
