<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dentist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dentist_model');
        $this->load->library('scraper');
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

        $dentistas = $this->scraper->scrape_dentistas($url);

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
