<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Scraper.php';
// require_once APPPATH . 'libraries/ScraperCopBax.php';
// require_once APPPATH . 'libraries/ScraperSancor.php';

class Dentist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dentist_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['dentistas'] = $this->Dentist_model->obtener_dentistas();
        $this->load->view('dentist/dentist_list', $data);
    }

    public function nuevo_scraping() {
        $this->load->view('dentist/new_scraping');
    }

    public function iniciar_scraping() {
        $url = $this->input->post('url');

        if (empty($url)) {
            echo "⚠️ Ingresar una URL válida.";
            return;
        }
        
        if (strpos($url, 'copba10.com.ar') !== false) {
            $scraper = new ScraperCopBax();
        } elseif (strpos($url, 'sancor.com.ar') !== false) {
            $scraper = new ScraperSancor();
        } else {
            echo "⚠️ No se encontró un scraper adecuado para la URL proporcionada.";
            return;
        }

        $dentistas = $scraper->scrape($url);

        if (empty($dentistas)) {
            echo "⚠️ No se encontraron dentistas en la página.";
            return;
        }

        foreach ($dentistas as $dentista) {
            $this->Dentist_model->guardar_dentista(
                $dentista['full_name'],
                $dentista['address'],
                $dentista['phone']
            );
        }

        redirect('dentist');
    }
}
