<?php

class Affichage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Affichage_Model');
        $this->load->model('User_Model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['title'] = "Affichage";
        $data['heure'] = date("G:i", strtotime(str_replace('-', ':', date('G-i'))));
        $data['reservations'] = $this->Affichage_Model->get_reservation(date('Y-m-d'),$data['heure']  );
        $data['particuliers'] = $this->User_Model->getComptes(1);
        $data['professionnels'] = $this->User_Model->getComptes(2);

        $this->load->view('Affichage/index', $data);
    }

}
