<?php

namespace App\Models;

use Conner\Likeable\LikeableTrait;
use Jenssegers\Date\Date;
use Orchid\Press\Models\Post as BasePost;
use willvincent\Rateable\Rateable;

class Post extends BasePost
{
    use LikeableTrait, Rateable;

    /**
     * @var array
     */
    protected $with = [
        'attachment',
    ];

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
     * @return string
     */
    public function hero()
    {
        return optional($this->attachment->first)->url ?? '';
    }

}