<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Olddvd extends CI_Controller {

     public function __construct() {

        parent::__construct();
        $this->load->model('Articles_Model');
        
        $this->load->helper('url_helper');
    }



        public function index(){
        $data['articles']=$this->Articles_Model->get_articles('news');
        $data['author']=$this->Articles_Model->get_articles('auteur');
        $data['horraires']=$this->Articles_Model->get_articles('horraire');
        //$data['author']=$this->Articles_Model->get_auteur('auteur');
        $this->load->view('Main/list',$data);
        //$this->load->view('footer');
        $this->load->library('javascript');
    }
}
