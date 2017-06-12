<?php

class Articles_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_articles($table) {

        $query = $this->db->get($table);
        return $query->result_array();
    }


}
