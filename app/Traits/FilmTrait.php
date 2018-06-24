<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait FilmTrait
{
    /**
     * @var string Перечислеиния типов данных
     */
    private static $CITIES = 'cities';
    private static $MOVIES = 'movie/list';
    private static $SCHEDULE = 'movie/schedule';
    private static $PLACE = 'place/object'; // Города

    /**
     * Фильмы.
     *
     * @var string
     */
    private $apiKey = '3c9f4e3a-30ae-40a9-959e-edddbef22e37';

    /**
     * Расписание фильмов.
     *
     * @var string
     */
    private $urlBase = 'http://api.kassa.rambler.ru/v2/';

    /**
     * Данные по месту.
     *
     * @var string
     */
    private $dataType = 'json';

    /**
     * @param $lowerCityName
     *
     * @return mixed
     */
    public function getCity($lowerCityName)
    {
        $citiesRequestUrl = $this->getCommandUrl($this::$CITIES);

        $cities = $this->getUrl($citiesRequestUrl, [], env('USE_PROXY', false));

        foreach ($cities->List as $city) {
            if (mb_strtolower($city->Name) == $lowerCityName) {
                return $city;
            }
        }
    }

    /**
     * @param $command
     *
     * @return string
     */
    private function getCommandUrl($command)
    {
        return $this->urlBase.$this->apiKey.'/'.$this->dataType.'/'.$command;
    }

    /**
     * @param      $url
     * @param      $options
     * @param bool $use_proxy
     *
     * @return mixed
     */
    private function getUrl($url, $options, $use_proxy = false)
    {
        $proxy = 'socks5://localhost:4000';

        $reqDataString = '';
        if (!empty($options)) {
            $reqDataString = $this->getRequestString($options);
        }
        $fullUrl = $url.$reqDataString;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fullUrl);

        if ($use_proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
        }

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $res = curl_exec($ch);

        curl_close($ch);

        return json_decode($res);
    }

    /**
     * @param $options
     *
     * @return string
     */
    private function getRequestString($options)
    {
        $tokens = [];

        foreach ($options as $optionKey => $optionValue) {
            $tokens[] = $optionKey.'='.$optionValue;
        }

        return count($tokens) > 0 ? '?'.implode($tokens, '&') : '';
    }

    /**
     * @param $cityId
     * @param $movieId
     *
     * @return mixed
     */
    public function getSchedule($cityId, $movieId)
    {
        $scheduleRequestUrl = $this->getCommandUrl($this::$SCHEDULE);

        $schedule = Cache::remember('cinema-schedule-'.$movieId, 10, function () use ($scheduleRequestUrl, $cityId, $movieId) {
            return $this->getUrl($scheduleRequestUrl, [
                'CityID'   => $cityId,
                'ObjectID' => $movieId,
            ], env('USE_PROXY', false));
        });

        return $schedule;
    }

    /**
     * @param $cityId
     *
     * @return mixed
     */
    public function getMoviesList($cityId)
    {
        $moviesRequestUrl = $this->getCommandUrl($this::$MOVIES);

        $movies = $this->getUrl($moviesRequestUrl, [
            'CityID' => $cityId,
        ], env('USE_PROXY', false));

        return $movies;
    }

    /**
     * @param $placeId
     *
     * @return mixed
     */
    public function getPlace($placeId)
    {
        $placeRequestUrl = $this->getCommandUrl($this::$PLACE);

        $placeData = $this->getUrl($placeRequestUrl, [
            'ObjectID' => $placeId,
        ], env('USE_PROXY', false));

        return $placeData;
    }
}
