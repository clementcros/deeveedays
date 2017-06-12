<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examples extends CI_Controller {

    public function __construct() {
        parent::__construct();


        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function _example_output($output = null) {
        $this->load->view('administratif.php', (array) $output);
    }

    public function offices() {
        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function index() {
        $this->security();

        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function commentaire() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('commentaire');
            $crud->set_subject('commentaire');
            $crud->required_fields('commentaire');
            $crud->columns('id', 'fk_film', 'date', 'texte');
            $crud->display_as('fk_film', 'film');
            //$crud->display_as('fk_particulier', 'Particulier');
            $crud->set_relation('fk_film', 'dvd', 'titre');
            //$crud->set_relation('fk_professionnel', 'Professionnel', 'nom');
            //$crud->set_relation('fk_machine', 'Machine', 'nom');
            //$crud->set_relation('fk_particulier', 'Particulier', 'nom');
            //$crud->set_field_upload('file_url','assets/uploads/files');
            // module upload de fichier rajouté colone dans la table avec le nom 'file_url' varchar 255 

            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function dvd() {
        
        
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('dvd');
            $crud->set_subject('film');
            $crud->required_fields('prenom');
            $crud->columns('id', 'titre', 'auteur','année_sortie','serial_number','fk_cat');
            $crud->set_relation('fk_cat', 'categorie', 'categorie');
            //$crud->set_field_upload('file_url','assets/uploads/files');
            // module upload de fichier rajouté colone dans la table avec le nom 'file_url' varchar 255 
            $output = $crud->render();



            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
      public function horraire() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('horraire');
            $crud->set_subject('horraire');
            $crud->required_fields('horraire');
            $crud->columns('id', 'ouverture_semaine', 'fermeture_semaine','ouverture_weekend','fermeture_weekend');
          
            //$crud->set_field_upload('file_url','assets/uploads/files');
            // module upload de fichier rajouté colone dans la table avec le nom 'file_url' varchar 255 
            $output = $crud->render();



            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function customers_management() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('Professionnel');
            $crud->join_table('professionel', 'ville');
            $crud->set_subject('professionnel');
            $crud->required_fields('prenom');
            $crud->columns('nom', 'prenom', 'email', 'tel', 'siret', 'raison_social', 'date_creation', 'date_adhesion', 'date_fin_abo');
            $crud->set_relation('id', 'ville', '{code_postal} {ville}');
            $crud->display_as('fk_ville', 'ville');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function ville() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('Ville');
            $crud->set_subject('ville');
            $crud->required_fields('ville');
            $crud->columns('id', 'ville', 'code_postal');
            $crud->set_relation('ville');


            //$crud->set_field_upload('file_url','assets/uploads/files');
            //$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/professionel")));
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }


    public function partenaires() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('Partenaires');
            $crud->set_subject('partenaire');
            $crud->required_fields('partenaire');
            $crud->columns('id', 'file_url');
           


            $crud->set_field_upload('file_url','assets/uploads/files');
            $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/professionel")));
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    public function professionel() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('Professionnel');
            $crud->set_subject('professionnel');
            $crud->required_fields('prenom');
            $crud->columns('nom', 'prenom', 'email', 'tel', 'siret', 'raison_social', 'date_creation', 'date_adhesion', 'date_fin_abo');
            $crud->set_relation('fk_ville', 'Ville', 'ville');
            $crud->display_as('fk_ville', 'Ville');
            $crud->set_relation('fk_profession', 'Profession', 'nom');
            $crud->display_as('fk_profession', 'Profession');
            $crud->set_relation('fk_abonnement', 'Abonnement', 'nom');
            $crud->display_as('fk_abonnement', 'Abonnement');
            $crud->edit_fields('nom', 'prenom', 'email', 'tel', 'siret','date_creation', 'date_adhesion', 'date_fin_abo','fk_profession','fk_ville','fk_abonnement');
            $crud->set_field_upload('file_url', 'assets/uploads/files');
            $crud->set_crud_url_path(site_url(strtolower(__CLASS__ . "/" . __FUNCTION__)), site_url(strtolower(__CLASS__ . "/Professionel")));
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function particulier() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('Particulier');
            $crud->set_subject('professionnel');
            $crud->required_fields('prenom');
            $crud->columns('id', 'nom', 'prenom', 'email', 'tel', 'date_adhesion', 'date_fin_abo');
            $crud->set_relation('fk_ville', 'Ville', 'ville');
            $crud->set_relation('fk_usager', 'Usager', 'nom');
            $crud->set_relation('fk_abonnement', 'Abonnement', 'nom');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function horaire() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('Horaire');
            $crud->set_subject('horaire');
            $crud->required_fields('prenom');
            $crud->columns('id', 'heure_debut', 'heure_fin', 'statut');


            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function machine() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('Machine');
            $crud->set_subject('machine');
            $crud->required_fields('prenom');
            $crud->columns('id', 'nom', 'dimenssion_coup', 'outil_disponible', 'caution');
            //$crud->set_relation('fk_machine','indisponible','date_debut');
            //$crud->set_relation('nom','indisponible','date_fin');

            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function dispo() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('Indisponible');
            $crud->set_subject('machine');
            $crud->required_fields('insidponible');
            $crud->columns('id', 'date_debut', 'date_fin', 'fk_machine');
            $crud->set_relation('fk_machine', 'Machine', 'nom');
            //$crud->set_relation('nom','indisponible','date_fin');

            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function articles() {
        $this->security();
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('flexigrid');
            $crud->set_table('Articles');
            $crud->set_subject('article');
            $crud->required_fields('articles');
            $crud->columns('id','titre', 'texte', 'lien', 'date');
            //$crud->set_field_upload('file_url', 'assets/uploads/files');

            //$crud->set_relation('nom','indisponible','date_fin');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
        
    }

    public function employees_management() {
        $this->security();
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('Employees');
        $crud->set_relation('officeCode', 'offices', 'city');
        $crud->display_as('officeCode', 'Office City');
        $crud->set_subject('Employee');

        $crud->required_fields('lastName');

        $crud->set_field_upload('file_url', 'assets/uploads/files');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function customers_managements() {
        $this->security();
        $crud = new grocery_CRUD();

        $crud->set_table('customers');
        $crud->columns('customerName', 'contactLastName', 'phone', 'city', 'country', 'salesRepEmployeeNumber', 'creditLimit');
        $crud->display_as('salesRepEmployeeNumber', 'from Employeer')
                ->display_as('customerName', 'Name')
                ->display_as('contactLastName', 'Last Name');
        $crud->set_subject('Customer');
        $crud->set_relation('salesRepEmployeeNumber', 'employees', 'lastName');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function abo() {

        $this->security();
        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_table('Abonnement');
        $crud->set_subject('*');
        $crud->required_fields('nom');
        $crud->columns('nom', 'tarif_etablis', 'tarif_msta', 'tarif_tarif_cnc', 'tarif_abo');
        //$crud->set_field_upload('file_url','assets/uploads/files');
        //$crud->unset_operations();

        $output = $crud->render();

        $this->_example_output($output);
    }

    private function security() {
        if (!isset($_SESSION['admin'])) {
            return redirect('admin/connexion', 'refresh');
        }
    }

}
