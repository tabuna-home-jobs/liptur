<?php
return function ($format, $date = false) {
    setlocale(LC_ALL, 'ru_RU.cp1251');
    if ($date === false) {
        $date = time();
    }
    if ($format === '') {
        $format = '%e&nbsp;%bg&nbsp;%Y&nbsp;г.';
    }
    $months = explode("|", '|января|февраля|марта|апреля|мая|июня|июля|августа|сентября|октября|ноября|декабря');
    $format = preg_replace("~\%bg~", $months[date('n', $date)], $format);
    $res = strftime($format, $date);
};
