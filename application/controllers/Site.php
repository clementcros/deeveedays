<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('site.php',(array)$output);
        
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
        public function resa()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('reservation');
			$crud->set_subject('reservation');
			$crud->required_fields('resa');
			$crud->columns('date','heure_debut','heure_fin','fk_professionnel','fk_particulier');
			$crud->display_as('fk_professionnel','Professionel');
			$crud->display_as('fk_particulier','Particulier');
                        $crud->set_relation('fk_paiement','paiement','montant');
                        $crud->set_relation('fk_professionnel','professionnel','nom');
                        $crud->set_relation('fk_machine','machine','nom');
                        $crud->set_relation('fk_particulier','particulier','nom');
			//$crud->set_field_upload('file_url','assets/uploads/files');
			// module upload de fichier rajouté colone dans la table avec le nom 'file_url' varchar 255 
			
			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        
	public function offices_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('employe');
			$crud->set_subject('employe');
			$crud->required_fields('prenom');
			$crud->columns('nom','prenom','date_naissance');
                        $crud->set_relation('fk_professionnel','professionnel','nom');
			//$crud->set_field_upload('file_url','assets/uploads/files');
			// module upload de fichier rajouté colone dans la table avec le nom 'file_url' varchar 255 
			$output = $crud->render();
			
			

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
    public function customers_management()
    {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('professionnel');
            $crud->join_table('professionel','ville');
            $crud->set_subject('professionnel');
            $crud->required_fields('prenom');
            $crud->columns('nom','prenom','email','tel','siret','raison_social','date_creation','date_adhesion','date_fin_abo');
            $crud->set_relation('id','ville','{code_postal} {ville}');
            $crud->display_as('fk_ville','ville');
            $output = $crud->render();

            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
	
    public function ville()
    {
      {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('ville');
            $crud->set_subject('ville');
            $crud->required_fields('ville');
            $crud->columns('id','ville','code_postal');
            $crud->set_relation('ville');

            
			//$crud->set_field_upload('file_url','assets/uploads/files');
			//$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/professionel")));
            $output = $crud->render();

            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
	}
    public function professionel()
    {
      {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('professionnel');
            $crud->set_subject('professionnel');
            $crud->required_fields('prenom');
            $crud->columns('nom','prenom','email','tel','siret','raison_social','date_creation','date_adhesion','date_fin_abo');
            $crud->set_relation('fk_ville','ville','ville');
            $crud->set_relation('fk_profession','profession','nom');
            $crud->set_relation('fk_abonnement','abonnement','nom');
            
			$crud->set_field_upload('file_url','assets/uploads/files');
			$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/professionel")));
            $output = $crud->render();
			
            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
	}
	  public function particulier()
    {
      {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('particulier');
            $crud->set_subject('professionnel');
            $crud->required_fields('prenom');
            $crud->columns('id','nom','prenom','email','tel','date_adhesion','date_fin_abo');
            $crud->set_relation('fk_ville','ville','ville');
            $crud->set_relation('fk_usager','usager','nom');
            $crud->set_relation('fk_abonnement','abonnement','nom');
            $output = $crud->render();

            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
	}
	 public function horaire()
    {
      {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('horaire');
            $crud->set_subject('horaire');
            $crud->required_fields('prenom');
            $crud->columns('id','heure_debut','heure_fin','statut');
			

            $output = $crud->render();

            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
	}
 public function machine()
    {
      {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('machine');
            $crud->set_subject('machine');
            $crud->required_fields('prenom');
            $crud->columns('id','nom','dimenssion_coup','outil_disponible','caution');
            //$crud->set_relation('fk_machine','indisponible','date_debut');
            //$crud->set_relation('nom','indisponible','date_fin');

            $output = $crud->render();

            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
	}
     public function dispo()
    {
      {
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('indisponible');
            $crud->set_subject('machine');
            $crud->required_fields('insidponible');
            $crud->columns('id','date_debut','date_fin','fk_machine');
            $crud->set_relation('fk_machine','machine','nom');
            //$crud->set_relation('nom','indisponible','date_fin');

            $output = $crud->render();

            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
	}
	public function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function customers_managements()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}


	
	public function abo()
	{
        try{
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('abonnement');
            $crud->set_subject('abonnement');
            $crud->required_fields('nom');
            $crud->columns('nom','tarif_etablis','tarif_msta','tarif_tarif_cnc','tarif_abo');
            //$crud->set_field_upload('file_url','assets/uploads/files');
					//$crud->unset_operations();

            $output = $crud->render();

            $this->_example_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
	}
}
