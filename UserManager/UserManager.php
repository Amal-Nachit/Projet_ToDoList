<?php

namespace UserManager;

use DbConnexion\DbConnexion;
use User\User;

class UserManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupére la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }

    public function login(string $email,string $password )
    {
        $hash = hash("whirlpool" ,$password);


        try {
            $stmt = $this->pdo->query("SELECT * FROM tdl_user WHERE EMAIL = '$email' AND password = '$hash' ");

            
        } catch (\PDOException $e) {
            var_dump($e);

        }
           while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                // Pour chaque ligne de résultat de la requête on ajoute 
                // cette ligne dans $products
                // au format Product ( notre classe qui agit comme un moule a gauffre)
                // Dans products se trouvera un tableau d'objet au format Product
                // Et donc avec les méthodes de classes ( getters et setters)
                $user = new User($row);
            }

            if(isset($user)){
            return $stmt->rowCount() == 1;
            }

    }

      public function register(User $user )
    {

        // On peut appliquer la fonction filterValidateEmail 
        // si on souhaite vérifier que l'email existe déja , il faut faire une requête en ce sens 
    


        // On a besoin de hasher le mdp , j'utilise donc la fonction hash de php 
        // qui attend en paramètre un nom d'algorithme de hashage, ici j'utilise whirlpool , qui est assez sécurisé,
        // mais on pourait aussi utiliser SHA256, ou une bibliothèque de hashage spécialisée comme BCRYPT ou Argon2, ou d'autres...
        // Le premier paramètre de cette fonction native de php est l'algo de hashage à utiliser, le deuxième, la chaine de caractères 
        // à hasher
        // php connaît deja whirlpool
        $password = hash("whirlpool", $user->getPASSWORD());

        try {
            // Je peux préparer ma requête 
            // ATTENTION à avoir le BON nombre de champs , conformément à la table concernée
            $stmt = $this->pdo->prepare("INSERT INTO tdl_user VALUES(NULL, ?, ?, ?, ?)");
            // ICI , je dois faire ATTENTION à passer les éléments dans le même ordre que dans ma table USER
            $stmt->execute([ $user->getFIRSTNAME(),$user->getLASTNAME(), $password, $user->getEMAIL()]);



            // Si la requête a fonctionnée, et qu'une ligne en bdd a été modifiée 
            // Alors ca renvoi le chiffre 1 
            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // SI il y a eu une erreur dans la requête SQL , 
            // alors on retourne l'erreur au fichier de traitement.php
            return $e ; 
        }
    }


       public function checkUserExist(User $user )
    {
        $email = $user->getEMAIL();
 
        try {
            $stmt = $this->pdo->query("SELECT * FROM tdl_user WHERE EMAIL = '$email' ");

        } catch (\PDOException $e) {
            return $e;

        }
           while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $user = new User($row);
            }

            if(isset($user)){
            return $stmt->rowCount() == 1;
            }
            else{
                return 0;
            }

    }

}