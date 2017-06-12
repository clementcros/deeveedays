<?php

class Dvd_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_articles($table, $id=NULL ) {

        if ($id != NULL){

            $query = $this->db->get_where($table, array('id' => $id));
              return $query->row_array();
        }
else

        $query = $this->db->get($table);

        return $query->result_array();
    }

    public function get_commentaire( $id=NULL ) {

        if ($id != NULL){

            $query = $this->db->get_where('commentaire', array('fk_film' => $id));
              return $query->row_array();
        }
else

        $query = $this->db->get('commentaire');

        return $query->result_array();
    }


}
