<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Orchid\Platform\Core\Models\Post;
use Orchid\Platform\Core\Models\Setting;

class RussianTravelApi extends Command
{
    use ImageDownloadTrait;

    const USER_UPLOAD = 7;

    /**
     * @var int
     */
    public $time;

    /**
     * @var false|string
     */
    public $date;

    /**
     * @var
     */
    public $limit;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:russian-travel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка данных с сайта Russian Travel';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Current page.
     *
     * @var int
     */
    protected $page = 1;

    /**
     * Fist id post.
     *
     * @var
     */
    protected $fistId;

    /**
     * RussianTravelApi constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.russia.travel/api/',
            'timeout'  => 10,
        ]);
        $this->time = time();
        $this->date = date('Y/m/d');

        $this->limit = Setting::find('russian-travel');

        if (is_null($this->limit)) {
            Setting::create([
                'key'   => 'russian-travel',
                'value' => [
                    'news'   => 0,
                    'events' => 0,
                ],
            ]);
            $this->limit = Setting::find('russian-travel');
        }
        $this->limit = $this->limit->value;

        $this->uploadNews();
        $setting = Setting::find('russian-travel');
        $setting->value = $this->limit;
        $setting->save();
    }

    /**
     * @return null
     */
    protected function uploadNews()
    {
        $response = $this->client->get("https://api.russia.travel/api/news/frontend/v1/json/rus/news?page=$this->page");
        $content = json_decode($response->getBody()->getContents());

        foreach ($content->items as $item) {

            /*
             * Первый id
             */
            if (is_null($this->fistId)) {
                $this->fistId = $item->id;
            }

            /*
             * Лимит
             */
            if ($item->id < $this->limit['news'] || $item->id == $this->limit['news']) {
                $this->limit['news'] = $this->fistId;

                return;
            }

            $itemResponse = $this->client->get("https://api.russia.travel/api/news/frontend/v1/json/rus/article?id=$item->id");
            $itemContent = json_decode($itemResponse->getBody()->getContents());

            $Slugs = Post::where('slug', str_slug($itemContent->item->title))->count();
            if ($Slugs != 0) {
                $Slugs = str_slug($itemContent->item->title)->slug.'-'.($Slugs + 1);
            } else {
                $Slugs = str_slug($itemContent->item->title);
            }

            $newItems = [
                'publish_at' => $itemContent->item->date->from,
                'user_id'    => self::USER_UPLOAD,
                'type'       => 'news',
                'content'    => [
                    'ru' => [
                        'name'        => $itemContent->item->title,
                        'title'       => $itemContent->item->title,
                        'body'        => $itemContent->item->desc,
                        'description' => str_strip_limit_words($itemContent->item->desc, 200),
                        'keywords'    => 'новости туризма, новости россии, '.
                            $itemContent->item->local->name.' новости , '.
                            $itemContent->item->district->name.' новости, '.
                            $itemContent->item->region->name.' новости,',
                        'source'      => 'https://russia.travel',
                    ],
                ],
                'options'    => [
                    'locale' => [
                        'ru' => true,
                        'en' => false,
                    ],
                ],
                'slug'       => $Slugs,
            ];

            $post = Post::create($newItems);

            foreach ($itemContent->item->images as $image) {
                $this->uploadImage($image, $post->id);
            }
        }

        if ($this->page == $content->_meta->pageCount) {
            $this->page = 1;

            return;
        } else {
            $this->page++;
            $this->uploadNews();
        }
    }

    /**
     * @param      $image
     * @param null $post_id
     *
     * @return mixed
     */
    private function uploadImage($image, $post_id = null)
    {
        $imageSrc = $image->image->src;
        $imageInfo = pathinfo($imageSrc);
        $name = sha1(time().$imageInfo['filename']);

        $imageDate = $this->date;
        $imageStoragePath = 'app/public/'.$imageDate.'/'.$name.'.'.$imageInfo['extension'];
        $externalImagePath = 'https://russia.travel'.$imageSrc;

        $client = $this->client;

        return $this->saveImage($post_id, $client, $externalImagePath, $imageStoragePath, $imageDate, $imageInfo, $name);
    }
}
