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
        $password = hash("whirlpool", $user->getPASSWORD());

        try {
            $stmt = $this->pdo->prepare("INSERT INTO tdl_user VALUES(NULL, ?, ?, ?, ?)");
            $stmt->execute([ $user->getFIRSTNAME(),$user->getLASTNAME(), $password, $user->getEMAIL()]);



            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
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