<?php

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('User_Model');
        $this->load->helper('url_helper');
    }

    // fonction qui envoi sur la page de connexion
    public function index() {
        $data['title'] = "Connexion";
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'Le nom doit faire 3 caractères minimum',
        ));
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|alpha_dash', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'Le mot de passe doit faire 5 caractères minimum',
            'alpha_dash' => 'Le mot de passe ne doit contenir que des caractères alpha-numérique, des _ ou des -'
        ));


        //declaration des variables qui serviront pour créer le formulaire
        $data['email'] = array(
            'label' => 'E-mail: ',
            'name' => 'email',
            'class' => 'user',
            'placeholder' => 'E-mail...',
        );
        $data['password'] = array(
            'label' => 'Mot de passe : ',
            'name' => 'password',
            'class' => 'user',
            'placeholder' => 'Mot de passe ...',
            'type' => 'password',
        );
        //si la variable POST existe alors on instancie la variable de Session
        if (($_POST) && ($this->form_validation->run())) {
            $response = $this->User_Model->verif_connect($_POST['password'], $_POST['email']);
            if ($response !== 0) {
                
                $_SESSION['user'] = $this->User_Model->verif_connect($_POST['password'], $_POST['email']);
                redirect('user/account', 'refresh');
            }
        }
        $this->load->view('header');
        $this->load->view('User/index', $data);
        $this->load->view('footer');
    }

    //fonction de création de compte
    public function create() {
        $data['title'] = "Inscription";
        // on passe à la vue des variables contenants le nécessaires afin de créer les formulaires sur la vue
        if ($this->input->post('type') == "particulier") {
            $this->validationAccount(1);
            $data['form']['particulier'] = $this->formAccount(1, $_POST);
            $data['form']['professionnel'] = $this->formAccount(2);
        } elseif ($this->input->post('type') == "professionnel") {
            $this->validationAccount(2);
            $data['form']['particulier'] = $this->formAccount(1);
            $data['form']['professionnel'] = $this->formAccount(2, $_POST);
        } else {
            $data['form']['particulier'] = $this->formAccount(1);
            $data['form']['professionnel'] = $this->formAccount(2);
        }

        

        // on verifie que l'on vient d'un formulaire et l'on teste si l'ajout en base de données peut se faire
        // si c'est le cas, l'ajout se fait, et ensuite on fait une redirection
        if ($this->form_validation->run() && ($_POST)) {
            if ($this->User_Model->add_account() != false) {
                redirect('user', 'refresh');
            }
        }
        $this->load->view('header');
        $this->load->view('User/create', $data);
        $this->load->view('footer');
    }

    // fonction pour modifier son profil
    public function modif() {
        $data['title'] = "Mon compte";

        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['user']['siret'])) {
                $data['form'] = $this->formAccount(2, $_SESSION['user']);
            } else {
                $data['form'] = $this->formAccount(1, $_SESSION['user']);
                $this->validationAccount(1);
            }
            if ($this->input->post()) {
                $this->User_Model->update_account();
            }
        } else {
            redirect('user', 'refresh');
        }
        $this->load->view('header');
        $this->load->view('User/modif', $data);
        $this->load->view('footer');
    }

    // fonction qui detruit la variale de connexion et qui renvoi que le page de connexion
    public function disconnect() {
        unset($_SESSION['user']);
        session_destroy();
        redirect('user', 'refresh');
    }

    public function getPassword() {
        $data['title'] = "Récupérer son mot de passe";
        $data['email'] = array(
            'name' => 'email',
            'class' => 'user',
            'placeholder' => 'E-mail...',);
        if ($this->input->post()) {
            $rand = rand(0, 100000);
            $this->User_Model->resetPassword($this->input->post('email'), $rand);
        }
        $this->load->view('header');
        $this->load->view('User/password', $data);
        $this->load->view('footer');
    }

    // fonction qui génère un formulaire particulier ou pro en fonction du paramètre envoyé
    public function formAccount($choix, $valeur = NULL) {

        if ($valeur != NULL) {
            if (!isset($valeur['fk_ville'])) {
                $ville = $this->User_Model->verif_ville($valeur['cp'], $valeur['ville']);
            } else
                $ville = $this->User_Model->getVille($valeur['fk_ville']);
        } else {
            $ville['code_postal'] = "";
            $ville['ville'] = "";
        }
        $form['nom'] = array(
            'label' => 'Nom : ',
            'name' => 'nom',
            'class' => 'user',
            'placeholder' => 'Nom...',
            'value' => $valeur['nom'],
        );
        $form['prenom'] = array(
            'label' => 'Prénom : ',
            'name' => 'prenom',
            'class' => 'user',
            'placeholder' => 'Prenom ...',
            'value' => $valeur['prenom'],
        );
        $form['email'] = array(
            'label' => 'E-mail : ',
            'name' => 'email',
            'class' => 'user',
            'placeholder' => 'E-mail...',
            'value' => $valeur['email'],
        );
        $form['password'] = array(
            'label' => 'Mot de passe : ',
            'type' => 'password',
            'name' => 'password',
            'class' => 'user',
            'placeholder' => 'Mot de passe...',
        );
        $form['old_password'] = array(
            'label' => 'Ancien mot de passe:',
            'name' => 'old_password',
            'class' => 'user',
            'placeholder' => 'Ancien mot de passe...',
        );
        $form['adresse'] = array(
            'label' => 'Adresse : ',
            'name' => 'adresse',
            'class' => 'user',
            'placeholder' => 'Adresse ...',
            'value' => $valeur['adresse'],
        );
        $form['ville'] = array(
            'label' => 'Ville : ',
            'name' => 'ville',
            'class' => 'user',
            'placeholder' => 'Ville...',
            'value' => $ville['ville'],
        );
        $form['cp'] = array(
            'label' => 'Code Postal : ',
            'name' => 'cp',
            'class' => 'user',
            'placeholder' => 'Code Postal ...',
            'value' => $ville['code_postal'],
        );
        $form['tel'] = array(
            'label' => 'Téléphone : ',
            'name' => 'tel',
            'class' => 'user',
            'placeholder' => 'N°Tel...',
            'value' => $valeur['tel'],
        );
        $form['abonnement'] = array(
            'name' => 'abonnement',
            'class' => 'user',
            'placeholder' => 'Abonnement...',
        );

        if ($choix == 1) {
            $form['assurance'] = array(
                'label' => 'N° Assurance',
                'name' => 'assurance',
                'class' => 'user',
                'placeholder' => 'Assurance ...',
                'value' => $valeur['assurance'],
            );
            $form['date_naissance'] = array(
                'label' => 'Date de naissance : ',
                'type' => 'date',
                'name' => 'date_naissance',
                'class' => 'user date',
                'placeholder' => 'Date de naissance ...',
                'id' => 'date',
                'value' => $valeur['date_naissance'],
            );
            $form['type'] = array(
                'name' => 'type',
                'class' => 'user',
                'type' => 'hidden',
                'value' => 'particulier',
            );
        }
        if ($choix == 2) {
            $form['raison'] = array(
                'label' => 'Raison sociale : ',
                'name' => 'raison',
                'class' => 'user',
                'placeholder' => 'Raison sociale...',
                'value' => $valeur['raison_sociale'],
            );
            $form['siret'] = array(
                'label' => 'Siret : ',
                'name' => 'siret',
                'class' => 'user',
                'placeholder' => 'N°Siret ...',
                'value' => $valeur['siret'],
            );
            $form['creation'] = array(
                'label' => 'Date de création : ',
                'type' => 'date',
                'name' => 'date_creation',
                'class' => 'user',
                'placeholder' => '00-00-0000',
                'value' => $valeur['date_creation'],
            );
            $form['type'] = array(
                'name' => 'type',
                'class' => 'user',
                'type' => 'hidden',
                'value' => 'professionnel',
            );
        }
        return $form;
    }

    // fonction qui créer les controles de saisies, REGEX etc ...
    public function validationAccount($choix) {

        $this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[3]', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'Le nom doit faire 3 caractères minimum'
        ));

        $this->form_validation->set_rules('prenom', 'prenom', 'trim|required|min_length[3]', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'Le nom doit faire 3 caractères minimum'
        ));
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[Email.Email]', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'Le nom doit faire 3 caractères minimum',
            'is_unique' => 'Cette adresse mail est déjà utilisée'
        ));

        $this->form_validation->set_rules('tel', 'tel', 'trim|required|exact_length[10]|integer', array(
            'required' => 'Vous devez saisir un %s.',
            'exact_length' => 'Le numéro de téléphone doit contenir 10 chiffres',
            'integer' => 'Le téléphone doit contenir que des chiffres'
        ));
        $this->form_validation->set_rules('cp', 'cp', 'trim|required|exact_length[5]|integer', array(
            'required' => 'Vous devez saisir un code postal.',
            'exact_length' => 'Le code postal doit contenir 5 chiffres',
            'integer' => 'Le code postal doit contenir que des chiffres'
        ));
        $this->form_validation->set_rules('adresse', 'adresse', 'trim|required|min_length[5]', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'L\'adresse doit faire 5 caractères minimum'
        ));
        $this->form_validation->set_rules('ville', 'ville', 'trim|required', array(
            'required' => 'Vous devez saisir une %s.',
        ));

        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|alpha_dash', array(
            'required' => 'Vous devez saisir un %s.',
            'min_length' => 'Le mot de passe doit faire 5 caractères minimum',
            'alpha_dash' => 'Le mot de passe ne doit contenir que des caractères alpha-numérique, des _ ou des -'
        ));
        if($choix == 1){
        $this->form_validation->set_rules('assurance', 'assurance', 'trim|required', array(
            'required' => 'Vous devez saisir une %s.',
        ));
        $this->form_validation->set_rules('date_naissance', 'date de naissance', 'trim|required', array(
            'required' => 'Vous devez saisir une %s.',
        ));
        }
        elseif ($choix == 2) {
            $this->form_validation->set_rules('siret', 'n° siret', 'trim|required', array(
                'required' => 'Vous devez saisir un %s.',
            ));
            $this->form_validation->set_rules('date_creation', 'date de creation', 'trim|required', array(
                'required' => 'Vous devez saisir une %s.',
            ));
            $this->form_validation->set_rules('raison', 'raison sociale', 'trim|required', array(
                'required' => 'Vous devez saisir une %s.',
            ));
        }
    }

}
