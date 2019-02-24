<?php

namespace App\Http\Screens\ProductArrivals;

use App\Models\ProductArrival;
use Orchid\Screen\Screen;
use Orchid\Screen\Link;

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
        $productArrivals = ProductArrival::orderBy('updated_at','desc')->paginate();
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

            //тут работа с моделью Product

            Layouts::modals([
                'transaction' => Layouts::rows([
                    InputField::make('transaction.count'),
                ]),
            ]),

        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function transaction()
    {
        //РаботаеМ с МОДЕЛЬЮ ТРАНЗАКЦИИ
    }
}
