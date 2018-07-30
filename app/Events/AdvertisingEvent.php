<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Http\Forms\Advertising\AdvertisingFormGroup;

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