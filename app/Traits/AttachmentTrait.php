<?php
declare(strict_types=1);
namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
trait AttachmentTrait
{
    /**
     * The Eloquent tags model name.
     *
     * @var string
     */
    protected static $attachmentModel = 'App\Models\Attachment';
    /**
     * @return string
     */
    public static function getAttachmentModel() : string
    {
        return static::$attachmentModel;
    }
    /**
     * @param $model
     */
    public static function setAttachmentModel($model) : void
    {
        static::$attachmentModel = $model;
    }
    /**
     * @param null $type
     *
     * @return MorphToMany
     */
    public function attachmentType($type = null) : MorphToMany
    {
        if (! is_null($type)) {
            return $this->morphToMany(static::$attachmentModel, 'attachmentable', 'attachmentable', 'attachmentable_id',
                'attachment_id')->whereIn('extension', $this->getArrayWithUpCase(config('category.attachment.'.$type)));
        }
        return $this->morphToMany(static::$attachmentModel, 'attachmentable', 'attachmentable', 'attachmentable_id',
            'attachment_id');
    }


    public function attachmentWithType($type = null)
    {
        return $this->attachment->whereIn('extension',$this->getArrayWithUpCase(config('category.attachment.'.$type)));
    }


    public function getArrayWithUpCase($array):array {
        return array_merge($array,array_flip(array_change_key_case(array_flip($array), CASE_UPPER)));
    }


}