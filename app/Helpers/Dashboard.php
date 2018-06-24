<?php


if (!function_exists('dashboard_posts')) {
    function dashboard_posts()
    {
        $posts = collect(config('platform.many'));

        return $posts->map(function ($item) {
            return new $item();
        });
    }
}
