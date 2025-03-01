<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class ScraperBase {

    private $browser;

    public function __construct() {
        $this->browser = new HttpBrowser(HttpClient::create());
    }

    protected function request($url) {
        return $this->browser->request('GET', $url);
    }
}

class ScraperCopBax extends ScraperBase {

    public function scrape($url) {
        $crawler = $this->request($url);
        $dentistas = [];

        $crawler->filter('.directorist-listing-single__header')->each(function (Crawler $node) use (&$dentistas) {
            $fullName = $node->filter('.directorist-listing-title a')->count() ? trim($node->filter('.directorist-listing-title a')->text()) : 'N/A';
            $address  = $node->filter('.directorist-listing-card-address')->count() ? trim($node->filter('.directorist-listing-card-address')->text()) : 'N/A';
            $phone    = $node->filter('.directorist-listing-card-address')->count() ? trim($node->filter('.directorist-listing-card-address')->text()) : 'N/A';

            $dentistas[] = [
                'full_name' => $fullName,
                'address'   => $address,
                'phone'     => $phone
            ];
        });
        return $dentistas;
    }
}

class ScraperSancor extends ScraperBase {

    public function scrape($url){
        $crawler = $this->request($url);
        $dentistas = [];

        ################################

        return $dentistas;
    }
}
