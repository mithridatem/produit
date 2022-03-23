<?php
    class Product{
        //attributs
        private $id_prod;
        private $name_prod;
        private $content_prod;
        private $visible_prod;
        //getter et setter
        //getter idProd
        public function getIdProd(){
            return $this->id_prod;
        } 
        //setter idProd
        public function setIdProd($newId){
            $this->id_prod = $newId;
        }
        //getter nameProd
        public function getNameProd(){
            return $this->name_prod;
        } 
        //setter nameProd
        public function setNameProd($newName){
            $this->name_prod = $newName;
        }
        //getter contentProd
        public function getContentProd(){
            return $this->content_prod;
        } 
        //setter contentProd
        public function setContentProd($newContent){
            $this->content_prod = $newContent;
        }
        //getter visibleProd
        public function getVisibleProd(){
            return $this->visible_prod;
        } 
        //setter visibleProd
        public function setvisibleProd($newVisible){
            $this->visible_prod = $newVisible;
        }
        //méthodes
        //fonction afficher les produits avec checkbox admin
        public function showProd($bdd){
            try
            {
                $req = $bdd->prepare('SELECT * FROM product');
                //Exécution de la requête SQL création à l’aide d’un tableau qui va contenir le ou les paramètres à affecter à la requête SQL
                $req->execute();
                //boucle pour parcourir et afficher le contenu de chaque ligne de la table
                while ($donnees = $req->fetch())
                {   
                    if($donnees['visible_prod'] == 1){
                        //affichage des produits avec une checkbox
                        echo '<p class="show"><input type="checkbox" name="id_prod[]" 
                        value="'.$donnees['id_prod'].'"/>'.$donnees['name_prod'].' </p>'; 
                    }
                    else{
                        //affichage des produits avec une checkbox
                        echo '<p class="none"><input type="checkbox" name="id_prod[]" 
                        value="'.$donnees['id_prod'].'"/>'.$donnees['name_prod'].' </p>'; 
                    }
                }
            }
            catch(Exception $e)
            {   
                //affichage d'une exception
                die('Erreur : '.$e->getMessage());
            }
        }
        //fonction mise à jour de la visibilité des produits admin
        public function updateProd($bdd, $value){
            try
            {
                //afficher les produits depuis leur id_prod ($value)
                $req = $bdd->prepare("SELECT * FROM product where id_prod = $value");
                //Exécution de la requête SQL
                $req->execute();
                //boucle pour parcourir et afficher le contenu de chaque ligne de la table
                while ($donnees = $req->fetch())
                {   
                    //si visible_prod = 0 on le passe à 1
                    if($donnees['visible_prod'] == 0){
                        //requete pour update le statut du produit = 1 (true)
                        $req2 = $bdd->prepare('UPDATE product SET visible_prod = 1 Where id_prod =:id_prod');
                        $req2->execute(array(
                        'id_prod' => $value,
                        ));
                    }
                    //sinon on le passe à 0
                    else{
                        //requete pour update le statut du produit = 0 (false)
                        $req3 = $bdd->prepare('UPDATE product SET visible_prod = 0 Where id_prod =:id_prod');
                        $req3->execute(array(
                        'id_prod' => $value,
                        ));
                    }
                }
            }
            catch(Exception $e)
            {   
                //affichage d'une exception
                die('Erreur : '.$e->getMessage());
            }
        }
    
        //fonction afficher les produits avec checkbox user
        public function showProdUser($bdd){
            try
            {   //visible_prod à 1 pour afficher que les produits qui ont le statut
                $req = $bdd->prepare('SELECT * FROM product where visible_prod=1');
                //Exécution de la requête SQL création à l’aide d’un tableau qui va contenir le ou les paramètres à affecter à la requête SQL
                $req->execute();
                //boucle pour parcourir et afficher le contenu de chaque ligne de la table
                while ($donnees = $req->fetch())
                {   
                //affichage des produits 
                echo '<p>'.$donnees['name_prod'].'</p>'; 
                }
            }
            catch(Exception $e)
            {   
                //affichage d'une exception
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>