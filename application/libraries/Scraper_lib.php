<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Goutte\Client;

class Scraper {

    public function scrape_dentistas($url) {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $dentistas = [];

        $crawler->filter('.dentist-card')->each(function ($node) use (&$dentistas) {
            $dentistas[] = [
                'full_name' => trim($node->filter('.name')->text()),
                'address'   => trim($node->filter('.address')->text()),
                'phone'     => trim($node->filter('.phone')->text())
            ];
        });

        return $dentistas;
    }
}
