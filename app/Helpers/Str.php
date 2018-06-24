<?php

/**
 * The str_limit function limits the number of characters in a string.
 *
 * @param $str
 * @param $size
 * @param $end
 *
 * @return string
 */
if (!function_exists('str_limit_words')) {
    function str_limit_words($str, $size = 100, $end = '...')
    {
        return mb_substr($str, 0, mb_strrpos(mb_substr($str, 0, $size, 'utf-8'), ' ', 'utf-8'), 'utf-8').' '.$end;
    }
}

/*
 * The str_limit function limits the number of characters in a string.
 *
 * @param $str
 * @param $size
 * @param $end
 *
 * @return string
 */
if (!function_exists('str_strip_limit_words')) {
    function str_strip_limit_words($str, $size = 100, $end = '...')
    {
        return str_limit_words(strip_tags($str), $size, $end);
    }
}

/*
 * TODO: Написать нормально!
 */

if (!function_exists('str_date_top')) {
    function str_date_top($open, $close)
    {
        if (is_null($open) || is_null($close)) {
            return 'null';
        }

        /*
        $open = new \Carbon\Carbon($open);
        $close = new \Carbon\Carbon($close);
*/

        $open = date_parse($open);
        $close = date_parse($close);

        $oneMoth = $open['month'] == $close['month'];
        $oneDay = $open['day'] == $close['day'];
        $oneTime = $open['hour'].$open['minute'] == $close['hour'].$close['minute'];

        if ($oneMoth && $oneDay && $oneTime) {
            return 'one'; //Одна дата
        }

        if ($oneMoth && $oneDay && !$oneTime) {
            return 'oneDate'; //Одна дата разное время
        }

        if ($oneMoth && !$oneDay) {
            return 'oneMoth'; //Один месяц разные дни
        }

        return 'null';
    }
}

if (!function_exists('date_block')) {
    function date_block($timestamp)
    {
        $dateCar = \Carbon\Carbon::createFromTimestampUTC($timestamp);

        return [
            'day'     => $dateCar->formatLocalized('%d %B'),
            'weekDay' => $dateCar->formatLocalized('%A'),
        ];
    }
}

if (!function_exists('date_time_block')) {
    function date_time_block($dateTime)
    {
        $date = \Carbon\Carbon::parse($dateTime);

        return $date->format('H:i');
    }
}
