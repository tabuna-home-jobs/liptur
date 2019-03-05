<?php

namespace App\Models;

use Conner\Likeable\LikeableTrait;
use Jenssegers\Date\Date;
use Orchid\Press\Models\Post as BasePost;
use willvincent\Rateable\Rateable;
use Orchid\Platform\Traits\MultiLanguageTrait;

class Post extends BasePost
{
    use LikeableTrait, Rateable, MultiLanguageTrait;

    /**
     * @var array
     */
    protected $with = [
        'attachment',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->publish_at = Carbon::now();
        });

        self::saving(function ($model) {
            $model->createSlug($model->slug);
        });
    }

    /**
     * @return string
     */
    public function get_called_class()
    {
        return get_parent_class($this);
    }

    /**
     * @param string $format
     *
     * @return mixed|string
     */
    public function dataPublishLocalization($format = 'j bg Y'): string
    {
        return $this->ruDate($format, $this->publish_at->timestamp);
        // return Date::parse($this->publish_at->timestamp)->format($format);
    }

    /**
     * @param      $format
     * @param bool $date
     *
     * @return mixed|string
     */
    public function ruDate($format, $date = false)
    {
        $months = explode('|', '|января|февраля|марта|апреля|мая|июня|июля|августа|сентября|октября|ноября|декабря');
        $format = preg_replace('~bg~', $months[date('n', $date)], $format);

        return Date::parse($date)->format($format);
    }

    /**
     * Get the class name for polymorphic relations.
     *
     * @return string
     */
    public function getMorphClass()
    {
        return \App\Models\Post::class;
    }

    /**
     * @param string $size
     * @return string
     */
    public function hero($size='')
    {
        if(!isset($this->attachment[0])) {
            return null;
        }

        if (is_null(optional($this->attachment[0])->url)) {
            return null;
        }

        if (! empty($size)) {
            $path='/image/'.$size;
        } else {
            $path=$size;
        }
        return $path.$this->attachment[0]->url;
    }

}
