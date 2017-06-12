<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author lameliss
 */
class Main extends CI_Controller {

     public function __construct() {

        parent::__construct();
        $this->load->model('Articles_Model');
        
        $this->load->helper('url_helper');
    }



        public function index(){
        $data['articles']=$this->Articles_Model->get_articles('dvd');
        $data['author']=$this->Articles_Model->get_articles('auteur');
        $data['horraires']=$this->Articles_Model->get_articles('horraire');
        //$data['author']=$this->Articles_Model->get_auteur('auteur');
        $this->load->view('Main/index',$data);
        //$this->load->view('footer');
        $this->load->library('javascript');
    }
}

