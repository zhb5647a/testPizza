<?php
    class Utilisateur{
    /*-----------------------------------------
                    ATTRIBUTS
    ----------------------------------------*/
    protected $id_util;
    protected $nom_util;
    protected $prenom_util;
    protected $adresse_util;
    protected $mail_util;
    protected $mdp_util;
    protected $tel_util;
    protected $activ_util;
    protected $id_droit;

        /*-----------------------------------------
                        CONSTRUCTEUR
        ----------------------------------------*/
        public function __construct($nom, $prenom, $adresse, $mail, $mdp, $tel, $activ){
            $this->nom_util = $nom;
            $this->prenom_util = $prenom;
            $this->adresse_util = $adresse;
            $this->mail_util = $mail;
            $this->mdp_util = $mdp;
            $this->tel_util = $tel;
            $this->activ_util = $activ;
            
        }
        /*-----------------------------------------
                    GETTERS AND SETTER
        ----------------------------------------*/
        public function getIdUtil():int
        {
            return $this->id_util;
        }
        public function setIdUtil($id)
        {
            $this->id_util = $id;
    
            return $this;
        }
        public function getNomUtil():string
        {
            return $this->nom_util;
        }
        public function setNomUtil($nom)
        {
            $this->nom_util = $nom;
    
            return $this;
        }
        public function getPrenomUtil():string
        {
            return $this->prenom_util;
        }
        public function setPrenomUtil($prenom)
        {
            $this->prenom_util = $prenom;
    
            return $this;
        }

        public function getAdresseUtil():string
        {
            return $this->adresse_util;
        } 
        public function setAdresseUtil($adresse)
        {
            $this->adresse_util = $adresse;

            return $this;
        }
        public function getMailUtil():string
        {
            return $this->mail_util;
        }
        public function setMailUtil($mail)
        {
            $this->mail_util = $mail;
    
            return $this;
        }
        public function getMdpUtil():string
        {
            return $this->mdp_util;
        }
        public function setMdpUtil($mdp)
        {
            $this->mdp_util = $mdp;
    
            return $this;
        }
        public function getTelUtil():string
        {
            return $this->tel_util;
        }
        public function setTelUtil($tel)
        {
            $this->tel = $tel;

            return $this;
        }
        public function getActivUtil():string
        {
            return $this->activ_util;
        }
        public function setActivUtil($activ)
        {
            $this->activ_util = $activ;
    
            return $this;
        }
        public function getIdDroit()
        {
            return $this->id_droit;
        }
        public function setIdDroit($value)
        {
            $this->id_droit = $value;
    
            return $this;
        }
        // methodes

    // fonction pour voir tout les utilisateurs
    public function showAllUtilisateur($bdd):array{
        try {
            $req = $bdd->prepare('SELECT * FROM utilisateur');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour voir un utilisateur
    public function showUtilisateurById($bdd,$id_util):array{
        try {
            $req = $bdd->prepare('SELECT * FROM utilisateur WHERE id_util=:id_util');
            $req->execute(array(
                'id_util'=> $id_util,
            ));
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }


    // fonction pour crÃ©er
    public function addUtilisateur($bdd):void{
        $nom = $this->getNomUtil();
        $prenom = $this->getPrenomUtil();
        $adresse = $this->getAdresseUtil();
        $mail = $this->getMailUtil();
        $mdp = $this->getMdpUtil();
        $tel = $this->getTelUtil();
        $activ = $this->getActivUtil();
        try {
            $req = $bdd->prepare('INSERT INTO utilisateur(nom_util,prenom_util, adresse_util, mail_util, mdp_util, tel_util, activ_util) 
            VALUES (:nom_util,:prenom_util, :adresse_util, :mail_util, :mdp_util, :tel_util, :activ_util)');
            $req->execute(array(
                'nom_util' => $nom,
                'prenom_util' => $prenom,
                'mail_util' => $mail,
                'mdp_util' => $mdp,
                'tel_util' => $tel,
                'activ_util' => $activ                       
             ));
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }



// fonction pour modifier
    public function modifyUtilisateur($bdd,$id_util):void{
        $nom = $this->getNomUtil();
        $prenom = $this->getPrenomUtil();
        $adresse = $this->getAdresseUtil();
        $mail = $this->getMailUtil();
        $mdp = $this->getMdpUtil();
        $tel = $this->getTelUtil();
        $activ = $this->getActivUtil();
        try {
            $req = $bdd->prepare('UPDATE utilisateur SET nom_util=:nom_util, prenom_util=:prenom_util, adresse_util=:adresse_util, mail_util=:mail_util, mdp_util=:mdp_util, tel_util=:tel_util, activ_util=:activ_util
             WHERE id_util=:id_util');
            $req->execute(array(
                'id_util'=> $id_util,
                'nom_util' => $nom,
                'prenom_util' => $prenom,
                'mail_util' => $mail,
                'mdp_util' => $mdp,
                'tel_util' => $tel,
                'activ_util' => $activ
            ));
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

// fonction pour supprimer
    public function deleteUtilisateur($bdd,$id_util):void{
        try {
            $req = $bdd->prepare('DELETE FROM utilisateur WHERE id_util=:id_util');
            $req->execute(array(
                'id_util'=> $id_util,
            ));
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }


}

    
?>





   