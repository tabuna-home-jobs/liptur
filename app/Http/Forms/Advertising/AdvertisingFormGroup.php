<?php

namespace App\Http\Forms\Advertising;

use App\Core\Models\Post;
use App\Events\AdvertisingEvent;
use Illuminate\Contracts\View\View;
use Orchid\Platform\Forms\FormGroup;

class AdvertisingFormGroup extends FormGroup
{
    /**
     * @var
     */
    public $event = AdvertisingEvent::class;

    /**
     * Description Attributes for group.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name'        => 'Реклама',
            'description' => 'Управление контентом рекламы и его размещением',
        ];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View|\Illuminate\View\View
     */
    public function main(): View
    {
        return view('dashboard.advertising.grid', [
            'ads' => Post::type('advertising')->paginate(),
        ]);
    }
}
