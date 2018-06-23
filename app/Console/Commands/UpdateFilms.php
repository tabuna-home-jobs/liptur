<?php

namespace App\Console\Commands;

use App\Traits\FilmTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Orchid\Platform\Core\Models\Post;
use Orchid\Platform\Core\Models\Setting;

class UpdateFilms extends Command
{
    use ImageDownloadTrait, FilmTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:films {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка данных по фильмам с сервиса Rambler.Kassa';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var false|string
     */
    protected $date;

    /**
     * @var null
     */
    private $guzzle = null;

    /**
     * UpdateFilms constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->apiKey = env('RAMBLER_API_KEY');

        App::setLocale('ru');

        $this->client = new Client([
            'timeout' => 10,
        ]);
        $this->date = date('Y/m/d');
    }

    /**
     * Основной обработчик
     */
    public function handle()
    {
        // ID города
        $city = $this->getCurrentCity();
        $cityId = $city->CityID;

        $this->loadMovies($cityId);
    }

    /**
     * Текущий город
     * @return mixed
     */
    private function getCurrentCity()
    {
        $lowerCityName = env('RAMBLER_CITY_NAME', $this->argument('city'));

        $caseCityName = mb_convert_case($lowerCityName, MB_CASE_TITLE, 'UTF-8');

        $this->output->writeln('Начало импорта фильмов для города ' . $caseCityName);

        return $this->getCity($lowerCityName);
    }

    /**
     * @param $cityId
     */
    private function loadMovies($cityId)
    {
        $movies = $this->getMoviesList($cityId);

        $this->output->writeln('Фильмы найдены. Добавление...');
        $nowTime = Carbon::now();

        $setting = Setting::find('upload-films');

        if (!is_null($setting)) {
            $this->output->writeln('Метка времени: ' . $nowTime);
            $setting->value = [
                'time' => $nowTime,
            ];
            $setting->save();
        } else {
            Setting::create([
                'key'   => 'upload-films',
                'value' => [
                    'time' => $nowTime,
                ],
            ]);
        }

        foreach ($movies->List as $movie) {
            $exists = Post::where('content->' . App::getLocale() . '->ObjectID', '=', $movie->ObjectID)->first();
            $newSlug = SlugService::createSlug(Post::class, 'slug', $movie->Name);

            if (is_null($exists)) {
                $this->output->writeln('Новый: ' . $movie->Name);

                $post = Post::create([
                    'user_id'    => 1,
                    'type'       => 'film',
                    'content'    => [
                        'ru' => $movie,
                    ],
                    'options'    => [
                        'locale' => [
                            'ru' => true,
                        ],
                    ],
                    'publish_at' => $nowTime,
                    'slug'       => $newSlug,
                ]);

                if (!empty($post->getContent('HorizonalThumbnail'))) {
                    $this->uploadImage($post, $post->getContent('HorizonalThumbnail'));
                } else {
                    $this->uploadImage($post, $post->getContent('Thumbnail'));
                }
                $this->uploadImage($post, $post->getContent('Thumbnail'));
            } else {
                $this->output->writeln('Обновление: ' . $movie->Name);
                $exists->touch();
            }
        }
    }

    /**
     * @param $post
     * @param $imageSrc
     *
     * @return mixed
     */
    private function uploadImage($post, $imageSrc)
    {
        if (empty($imageSrc)) {
            $this->output->writeln($post->getContent('Name') . " - нет изображения");

            return;
        }

        $post_id = $post->id;
        $imageInfo = pathinfo($imageSrc);
        $name = sha1(time() . $imageInfo['filename']);

        if (!isset($imageInfo['extension'])) {
            $imageInfo['extension'] = 'jpg';
        }

        $imageDate = $this->date;
        $imageStoragePath = 'app/public/' . $imageDate . '/' . $name . '.' . $imageInfo['extension'];

        $client = $this->client;

        return $this->saveImage($post_id, $client, $imageSrc, $imageStoragePath, $imageDate, $imageInfo, $name);
    }
}
