<?php


if (!function_exists('dashboard_posts')) {
    function dashboard_posts()
    {
        return \Orchid\Support\Facades\Dashboard::getEntities();
    }
}
