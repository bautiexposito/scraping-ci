<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class Scraper {

    private $browser;

    public function __construct() {
        $this->browser = new HttpBrowser(HttpClient::create());
    }

    public function scrape_dentistas($url) {
        $crawler = $this->browser->request('GET', $url);
        $dentistas = [];

        $crawler->filter('.dentist-card')->each(function (Crawler $node) use (&$dentistas) {
            $fullName = $node->filter('.name')->count() ? trim($node->filter('.name')->text()) : 'N/A';
            $address  = $node->filter('.address')->count() ? trim($node->filter('.address')->text()) : 'N/A';
            $phone    = $node->filter('.phone')->count() ? trim($node->filter('.phone')->text()) : 'N/A';

            $dentistas[] = [
                'full_name' => $fullName,
                'address'   => $address,
                'phone'     => $phone
            ];
        });

        return $dentistas;
    }
}
