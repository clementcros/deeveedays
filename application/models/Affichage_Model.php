<?php

class Affichage_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_reservation($date, $heure = NULL) {
        if ($heure == NULL) {
            $query = $this->db->get_where('Reservation', array('date' => $date));
        } else {
            $sql = "SELECT * FROM Reservation WHERE date = '$date' AND heure_debut < '$heure' AND heure_fin > '$heure' ORDER by heure_fin ASC";
            $query = $this->db->query($sql);
        }
        return $query->result_array();
    }

    public function verif_connect($password, $email) {

        $query = $this->db->get_where('Particulier', array('email' => $email, 'password' => md5($password)));
        if ($query != null) {
            return $query->row_array();
        }
        $query = $this->db->get_where('Professionnel', array('email' => $email, 'password' => $password));
        if ($query != null) {
            return $query->row_array();
        }
        return 0;
    }

}
