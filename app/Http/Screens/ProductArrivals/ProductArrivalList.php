<?php

namespace App\Http\Screens\ProductArrivals;

use App\Http\Widgets\ProductsWidget;
use Illuminate\Support\Facades\App;
use App\Models\ProductArrival;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Link;
use Orchid\Screen\Layouts;
use Orchid\Screen\Fields\InputField;
use Orchid\Screen\Fields\RelationshipField;
use App\Orchid\Layouts\ProductArrivalTable;

class ProductArrivalList extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Список приходов товаров';
    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Список приходов товаров';

    /**
     * Query data.
     *
     * @return array
     */
    public function query() : array
    {
        $productArrivals = ProductArrival::orderBy('product_arrival.updated_at','desc')
            ->join('posts', 'posts.id', '=', 'product_arrival.product_id')
            ->select('product_arrival.slug', 'count', 'posts.content->'.App::getLocale().'->title as title')->paginate();
        return [
            'productArrivals' => $productArrivals,
        ];
    }

    /**
     * Button commands.
     *
     * @return array
     */
    public function commandBar() : array
    {
        return [

            Link::name('Добавить')
                ->modal('transaction')
                ->title('Количество товара')
                ->method('transaction')
                ->icon('icon-plus'),

        ];
    }

    /**
     * Views.
     *
     * @return array
     * @throws \Throwable
     */
    public function layout() : array
    {
        return [
            Layouts::modals([
                'transaction' => Layouts::rows([
                    RelationshipField::make()
                        ->name('product_id')
                        ->required()
                        ->title('Товар')
                        ->handler(ProductsWidget::class),
                    InputField::make('count')
                        ->title("Количество")
                        ->required()
                        ->type("number")
                ]),
            ]),
            ProductArrivalTable::class
        ];
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function transaction(Request $request)
    {
        $product_id =  $request->get('product_id');
        $count =  $request->get('count');

        if(!$product_id || !$count) {
            return abort(400);
        }

        ProductArrival::create($request->all());

        return back();
    }
}
