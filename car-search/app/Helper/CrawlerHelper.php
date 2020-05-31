<?php

namespace App\Helper;

use Exception;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;

class CrawlerHelper
{

    protected $urls = [];
    public $base_url;

    public function __construct(
        String $url = "https://seminovos.com.br/",
        $selectorParent = '.thumb-item',
        $selectorHref = '.thumb-link'
    ) {
        $this->base_url = $url;
        $this->setUrls($url, $selectorParent, $selectorHref);
        unset($crawler);
    }

    public function getUrls()
    {
        return $this->urls;
    }

    public function setUrls($url = null, $selectorParent, $selectorHref)
    {
        if (!$url) $url = $this->base_url;

        $crawler = $this->crawler($url);
        $this->urls = $crawler->filter($selectorParent)->each(function ($contentContainer) use ($selectorHref) {
            return $contentContainer->filter($selectorHref)->extract(['href'])[0];
        });
    }

    public function crawler(String $url)
    {
        try {
            $client = new Client(['verify' => false]);
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
            return new Crawler($html);
        } catch (Exception $e) {
            report($e);
            return;
        }
    }
}
