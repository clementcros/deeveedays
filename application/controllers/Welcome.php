<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	

     public function __construct() {

        parent::__construct();
        $this->load->model('Dvd_Model');
        
        $this->load->helper('url_helper');
    }
	public function get_dvd($id)
	{
		$data['article']=$this->Dvd_Model->get_articles('dvd',$id);
		$data['commentaires']=$this->Dvd_Model->get_commentaire($id);
		
		$this->load->view('dvdinfo',$data);
		$this->load->library('javascript');
	}
	  public function ajout_utilisateur() {
  
  /**Chargement des méthodes si déclarées dans le contrôleur**/
 
  $this->form_validation->set_rules('nom', '"Le Nom"', 'trim|required|xss_clean');
 
  $this->form_validation->set_rules('prenom', '"Le prénom"', 'trim|required|xss_clean');
 
  $this->form_validation->set_rules('mail', '"Le mail"', 'trim|required|valid_email|is_unique[users.email]|xss_clean');
 
}
}
