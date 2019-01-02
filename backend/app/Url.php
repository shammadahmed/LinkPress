<?php

namespace App;

use Illuminate\Support\Str;

class Url
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $this->buildUrl($url);
    }

    public function buildUrl($url)
    {
        if (parse_url($url, PHP_URL_SCHEME) == '') {
            $builtUrl = 'http://' . $url;

            return $builtUrl;
        }

        return $url;
    }

    public function shorten()
    {
        do {
            $hash = Str::random(4);
        } while (!Link::where('hash', $hash));

        return $hash;
    }

    public function getDetails()
    {
        libxml_use_internal_errors(true);

        $html = $this->getFileContentsCurl($this->url);

        $doc = new \DOMDocument();
        $doc->loadHTML($html);

        $this->details['title'] = trim($doc->getElementsByTagName('title')->item(0)->nodeValue);

        $image = $doc->getElementsByTagName('img')->item(0)->getAttribute('src');

        if (parse_url($image, PHP_URL_HOST) == '') {
            $parsedUrl = parse_url($this->url);

            $image = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . '/' . $image;
        }

        $this->details['image'] = $image;

        $metas = $doc->getElementsByTagName('meta');

        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);

            if ($meta->getAttribute('name') == 'description') {
                $this->details['description'] = trim($meta->getAttribute('content'));
            }
            if ($meta->getAttribute('name') == 'keywords') {
                $this->details['keywords'] = $meta->getAttribute('content');
            }
        }

        return $this->details;
    }

    public function getFileContentsCurl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $data = curl_exec($ch);

        curl_close($ch);

        return $data;
    }

    public function getData()
    {
        $details = $this->getDetails();
        $details['hash'] = $this->shorten();
        $details['url'] = $this->url;

        return $details;
    }
}
