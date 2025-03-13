<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Scraper.php';

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
        } elseif (strpos($url, 'dosembahia.com') !== false) {
            $scraper = new ScraperDOSEM();
        } elseif (strpos($url, 'saludbahiablanca.com') !== false) {
            $scraper = new ScraperSaludBB();
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
            if (!$this->Dentist_model->existe_dentista($dentista['full_name'])) {
                $this->Dentist_model->guardar_dentista(
                    $dentista['full_name'],
                    $dentista['address'],
                    $dentista['phone']
                );
            }
        }

        redirect('dentist');
    }

    public function exportar_csv() {
        $dentistas = $this->Dentist_model->obtener_dentistas();
    
        $filename = "lista_dentistas_" . date('Ymd') . ".csv";
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename={$filename}");
        header("Content-Type: text/csv; charset=UTF-8");
    
        $output = fopen("php://output", "w");
    
        fputcsv($output, ['ID', 'Nombre', 'Dirección', 'Teléfono']);
    
        foreach ($dentistas as $dentista) {
            fputcsv($output, [$dentista->id, $dentista->full_name, $dentista->address, $dentista->phone]);
        }
    
        fclose($output);
        exit;
    }
}
