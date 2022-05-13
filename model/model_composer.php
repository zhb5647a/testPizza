<?php 
    class Composer{

        protected $id_prod;
        protected $id_ing;
        protected $qtx;
    
        /*-----------------------------------------
                        CONSTRUCTEUR
        ----------------------------------------*/

            public function __construct($q){
                $this->qtx=$q;

            }
      /*-----------------------------------------
                    GETTERS AND SETTER
        ----------------------------------------*/

        public function getQtx():int
        {
                return $this->qtx;
        }
        public function setQtx($q)
        {
                $this->qtx = $q;

                return $this;
        }

           // methodes

    // fonction pour voir tout les compositions
    public function showAllComposer($bdd):array{
        try {
            $req = $bdd->prepare('SELECT * FROM composer');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }   
    public function addComposer($bdd):void{
        $q = $this->getQtx();
        try{
            $req = $bdd->prepare('INSERT INTO article(nom_article, prix_article) 
            VALUES(:nom_article, :prix_article)');
            $req->execute(array(
                'qtx' => $q,
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    } 




}

?>