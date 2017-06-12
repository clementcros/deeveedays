<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->helper('url_helper');
    }

    public function index() {

        $data['titre'] = "interface admin";

        //$this->load->view('header');
        $this->load->view('Admin/index', $data);
       // $this->load->view('footer');
    }

    public function getHoraire() {

        $data['horaires'] = $this->Admin_Model->get_horaire();
        if (empty($data['horaires'])) {
            show_404();
        }

        if ($_POST) {
            $this->Admin_Model->set_horaire($data['horaires']);
            $data['horaires'] = $this->Admin_Model->get_horaire();
        }

        $data['titre'] = "Gestion Horaire";

        $this->load->view('header');
        $this->load->view('Admin/horaire', $data);
        $this->load->view('footer');
    }

    public function connexion() {
        if (isset($_SESSION['admin'])) {
            redirect('admin', 'refresh');
        }

        if ($_POST && $this->Admin_Model->verif_connexion($this->input->post('user'), $this->input->post('password')) != 0) {
            $_SESSION['admin'] = $this->Admin_Model->verif_connexion($this->input->post('user'), $this->input->post('password'));
            redirect('admin', 'refresh');
        }

        $data['titre'] = "Connexion Admin";
        $data['user'] = array(
            'label' => 'Utilisateur: ',
            'name' => 'user',
            'class' => 'user',
            'placeholder' => 'Username...',
        );
        $data['password'] = array(
            'label' => 'Mot de passe : ',
            'name' => 'password',
            'class' => 'user',
            'placeholder' => 'Mot de passe ...',
            'type' => 'password',
        );



    
        $this->load->view('Admin/connexion', $data);
        
    }
    
    public function disconnect(){
        unset($_SESSION['admin']);
        session_destroy();
        redirect('admin/connexion', 'refresh');
    }

}
