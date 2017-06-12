<?php

class Reserver extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reservation_Model');
        $this->load->helper('url_helper');
        $this->load->database();
    }

    public function index() {
        $data['title'] = "Reserver";
        $data['mnom'] = Array("", "Janvier", "Février", "Mars"
            , "Avril", "Mai", "Juin", "Juillet", "Août"
            , "Septembre", "Octobre", "Novembre", "Décembre");



// on verifie que des variables ont été envoyé via formulaire
        if (!isset($_REQUEST["m"]))
            $data['m'] = date("n");
        else
            $data['m'] = $_REQUEST["m"];
        if (!isset($_REQUEST["a"]))
            $data['a'] = date("Y");
        else
            $data['a'] = $_REQUEST["a"];

// On instancie une variable avec la date du premier jour du mois de cette année
        $data['dayone'] = date("w", mktime(1, 1, 1, $data['m'], 1, $data['a']));
        if ($data['dayone'] == 0)
            $data['dayone'] = 7;

// On determine les limites de l'agenda (en année)
        $data['aplus'] = $data['a'] + 10;
        $data['amoins'] = $data['a'] - 10;

        $data['jours_in_month'] = cal_days_in_month(CAL_GREGORIAN, $data['m'], $data['a']);
// Calcul du nombe de semaine soit nb_jour ds le mois diviser par 7
// Et on arrondit au superieur
        $data['nb_semaine'] = ceil($data['jours_in_month'] / 7);
        $data['jours_a_afficher'] = $data['nb_semaine'] * 7;

        $this->load->view('header');
        $this->load->view('Reserver/index', $data);
        $this->load->library('javascript');
    }

    public function getDay($d, $m, $y) {
        $m --;
        $mois = Array("", "Janvier", "Février", "Mars"
            , "Avril", "Mai", "Juin", "Juillet", "Août"
            , "Septembre", "Octobre", "Novembre", "Décembre");
        $jour = array("Dimanche", "Lundi", "Mardi", "Mercredi",
            "Jeudi", "Vendredi", "Samedi");
        $numero_jour = date("w", mktime(0, 0, 0, $m, $d, $y));
        $date = array(
            "jour" => $jour[$numero_jour],
            "num_jour" => $d,
            "mois" => $mois[$m],
            "annee" => $y
        );
        $test = $m + 1;
        $day = $y."-".$test."-".$d;
        $reservation = $this->Reservation_Model->getByDate($day);
        $retour = array(
            "date" => $date,
            "reservation" => $reservation
        );
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($retour));
    }
        
    }
    