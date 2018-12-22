<?php

namespace App\Http\Screens\Basetojpg;

class ImageGeneratorFromText
{

    /**
     * @var \string
     */
    private $localPath;

    /**
     * @var \sting
     */
    private $webPath;

    /**
     * ImageGeneratorFromText constructor.
     */
    public function __construct(string $localPath, string $webPath)
    {
        $this->localPath = $localPath;
        $this->webPath = $webPath;
    }

    /**
     * @param \string $text
     *
     * @return string
     * @throws \Exception
     */
    public function transformText(string $text): string
    {
        $doc = new DOMDocument();
        $doc->loadHTML($text);
        $xpath = new DOMXPath($doc);
        $nodelist = $xpath->query("//img"); // find your image

        foreach ($nodelist as $node) {
            $value = $node->attributes->getNamedItem('src')->nodeValue;

            if (strpos($value, 'data:image') !== false) {
                $name = $this->randomString() . '.jpeg';
                $image = $this->webPath . $this->randomString() . '.jpeg';

                $this->base64ToJpeg($value, $this->localPath . '/' . $name);

                $text = str_replace($value, $image, $text);
            }
        }

        return $text;
    }


    /**
     * @return string
     * @throws \Exception
     */
    private function randomString()
    {
        return substr("abcdefghijklmnopqrstuvwxyz", random_int(0, 25), 1) . substr(md5(time()), 1);
    }

    /**
     * @param $base64_string
     * @param $output_file
     *
     * @return mixed
     */
    private function base64ToJpeg($base64_string, $output_file)
    {
        $ifp = fopen($output_file, 'wb');

        $data = explode(',', $base64_string);

        fwrite($ifp, base64_decode($data[1]));

        fclose($ifp);

        return $output_file;
    }

}