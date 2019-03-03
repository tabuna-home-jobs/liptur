<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Orchid\Support\Facades\Setting;

class Weather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Загрузка информации о погоде';

    /**
     * Create a new command instance.
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
        $client = new Client();
        $config = config('services.openweathermap');

        $weather = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather', [
            'query' => [
                'q'     => $config['q'],
                'APPID' => $config['key'],
                'units' => 'metric',
                'lang'  => 'ru',
            ],
        ]);

        $weather = json_decode($weather->getBody()->getContents());
        Setting::set('weather', $weather);
    }
}
