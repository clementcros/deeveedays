<?php

class User_Model extends CI_Model {

    // construteur qui fait la connexion à la base de données
    public function __construct() {
        $this->load->database();
    }

    // fonction qui verifie en base de données si le duo email/password existe et renvoi le résultat
    public function verif_connect($password, $email) {

          $query = $this->db->get_where('Professionnel', array('email' => $email, 'password' => md5($password)));
        if ($query->row_array()!= null) {
            return $query->row_array();
        }
        $query = $this->db->get_where('Particulier', array('email' => $email, 'password' => md5($password)));
        if ($query->row_array()!= null) {
            return $query->row_array();
        }
      
        return 0;
    }

    // fonction d'ajout de compte Particulier ou Pro, en fonction du formulaire par lequel on arrive
    public function add_account() {
        // création de compte particulier
        if ($this->input->post('type') == "particulier") {
            $this->load->helper('url');
            $data = $this->recup_form(1);
            // ajout en BDD
            return $this->db->insert('Particulier', $data);
        }
        // création de compte professionnel
        elseif ($this->input->post('type') == "professionnel") {
            $data = $this->recup_form(2);
            // ajout en BDD
            return $this->db->insert('Professionnel', $data);
        }
    }

    // fonction de mise à jour de compte
    public function update_account() {

        if ($this->input->post('type') == "particulier") {
            // appel de la fonction recup_form pour un particulier
            $data = $this->recup_form(1);
            $this->db->where('id', $_SESSION['user']['id']);
            return $this->db->update('Particulier', $data);
        } elseif ($this->input->post('type') == "professionnel") {
            // appel de la fonction recup_form pour un professionnel
            $data = $this->recup_form(2);
            $this->db->where('id', $_SESSION['user']['id']);
            return $this->db->update('Professionnel', $data);
        }
    }

    //fonction qui check en BDD si le duo Code postal et nom de ville existe, si c'est le cas elle la retourne sinon elle l'a crée puis la retourne
    public function verif_ville($cp, $ville) {
        $query = $this->db->get_where('Ville', array('code_postal' => $cp, 'ville' => strtoupper($ville)));
        if ($query->row_array() == NULL) {
            $this->db->insert('Ville', array('code_postal' => $cp, 'ville' => strtoupper($ville)));
            $query = $this->db->get_where('Ville', array('code_postal' => $cp, 'ville' => strtoupper($ville)));
        }
        return $query->row_array();
    }

    // fonction qui retourne une ville en bdd en fonction de l'id
    public function getVille($id) {
        $query = $this->db->get_where('Ville', array('id' => $id));
        return $query->row_array();
    }

    // fonction qui permet de reset le mot de passe avec une nombre random
    // PS : il manque encore à faire l'envoi de mail 
    public function resetPassword($mail, $rand) {
        $compte = $this->getCompte($mail);
        $compte['password'] = md5($rand);
        // envoi de mail à faire 
        if (!isset($compte['siret'])) {
            return $this->db->update('Particulier', $compte);
        } else {
            return $this->db->update('Professionnel', $compte);
        }
    }

    // fonction qui récupère un compte en base de données en fonction de l'adresse mail
    public function getCompte($email) {
        $query = $this->db->get_where('Particulier', array('email' => $email));
        if ($query->row_array() == NULL) {
            $query = $this->db->get_where('Professionnel', array('email' => $email));
        }
        if ($query->row_array() == NULL) {
            return false;
        }
        return $query->row_array();
    }

    public function getComptes($choix) {
        if ($choix == 1)
            $query = $this->db->get('Particulier');
        elseif ($choix == 2)
            $query = $this->db->get('Professionnel');
        return $query->result_array();
    }

    // récupère les données des champs du formulaire, les champs commun, puis les spécifiques 
    // grace à l'appel de la fonction spe_form()
    private function recup_form($choix) {
        $ville = $this->verif_ville($this->input->post('cp'), $this->input->post('ville'));
        $data = array(
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'email' => $this->input->post('email'),
            'adresse' => $this->input->post('adresse'),        
            'fk_ville' => $ville['id'],
            'fk_abonnement' => 1,
            'date_adhesion' => date('Y-m-d'),
            'tel' => $this->input->post('tel'),
        );
        if ($this->input->post('password')) {
            $data = array_merge($data, array('password' => md5($this->input->post('password'))));
        }
        $tab = $this->spe_form($choix);
        $data = array_merge($tab, $data);
        return $data;
    }

    // functon qui récupère les champs spécifiques à un compte pro ou part
    private function spe_form($choix) {
        if ($choix == 1)
            return array(
                'assurance' => $this->input->post('assurance'),
                'date_naissance' => $this->input->post('naissance'),
                'fk_usager' => 1,
                'formation' => false,
            );
        elseif ($choix == 2)
            return array(
                'fk_profession' => 1,
                'raison_sociale' => $this->input->post('raison'),
                'date_creation' => $this->input->post('creation'),
            );
    }
}
