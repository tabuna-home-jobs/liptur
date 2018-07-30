<?php

namespace App\Events;

use App\Http\Forms\Advertising\AdvertisingFormGroup;
use Illuminate\Queue\SerializesModels;

class AdvertisingEvent
{
    use SerializesModels;

    /**
     * @var
     */
    protected $form;

    /**
     * Create a new event instance.
     * SomeEvent constructor.
     *
     * @param AdvertisingFormGroup $form
     */
    public function __construct(AdvertisingFormGroup $form)
    {
        $this->form = $form;
    }
}
