<?php

class Admin_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_horaire() {

        $query = $this->db->get('Horaire');
        return $query->result_array();
    }

    public function set_horaire($horaires) {

        $this->load->helper('url');

        foreach ($horaires as $horaire):


            $data = array(
                'heure_debut' => $this->input->post('debut_' . $horaire['id']),
                'heure_fin' => $this->input->post('fin_' . $horaire['id']),
                'statut' => $this->input->post('statut_' . $horaire['id'])
            );

            $this->db->where('id', $horaire['id']);
            $this->db->update('Horaire', $data);
        endforeach;
    }
    
    public function verif_connexion($user,$pw){
         $query = $this->db->get_where('admin', array('email' => $user, 'password' => md5($pw)));
        if ($query->row_array()!= null) 
            return $query->row_array();
        else 
            return 0;
    }

}
