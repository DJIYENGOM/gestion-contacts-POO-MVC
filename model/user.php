<?php
include_once("../config/Database.php");

class Utilisateurs {
    private $Nom;
    private $Email;
    private $MotDePass;
    private $ConfirmPass;
    public function __construct(){
    }
     public function getNom() {
        return $this->Nom;
    }
    public function setNom($Nom) {
        if(!preg_match("/^[a-zA-Z][a-zA-Zàéùè -]{2,100}$/", $Nom)) {
            array_push($erreurs,"veuillez entrer un nom d'utilisateur valide");
          }else{ $this->Nom = $Nom;}
       
    }
    public function getEmail() {
        return $this->Email;
    }
    public function setEmail($Email) {
        $this->Email = $Email;
    }
    public function getMotDePass() {
        return $this->MotDePass;
    }
    public function setMotDePass($MotDePass) {
        $this->MotDePass = $MotDePass;
    }

    public function getConfirmPass() {
        return $this->ConfirmPass;
    }
    public function setConfirmPass($ConfirmPass) {
        $this->ConfirmPass = $ConfirmPass;
    }

     function Inscription($var,$nom,$email,$motdepass){
       
                $query = "SELECT * FROM users WHERE email=:mail";
                $stmt = $var->prepare($query);
                $stmt->execute(['mail'=>$email]);
                if ($stmt->rowCount()==0) {
                  // Insertion des infos de l'utilisateur dans la base de données
                $insert = $var->prepare("INSERT INTO users (nom_user,email,mot_de_passe) VALUES (:nom, :email, :password)");
                $insert->execute(array(
                    'nom' => $nom,
                    'email' => $email,
                    'password' => $motdepass 
                ));
                 echo '<h2> votre inscription a reussie ! </h2>';
              }else{
                echo'ce compte existe déja';
                };
        }




                
     function Connexion($var,$email,$pass){
        session_start();
        $query="SELECT * FROM users WHERE email= ? AND mot_de_passe= ?"; // requete pour chercher les données de la base de donnée
   
        $statement=$var->prepare($query); // preparation de la requete".$mdp."'
        $statement->execute(array($email,$pass)); // execution de la requete
       
        $total_row=$statement->rowCount(); // conter le nombre de donné dans la base de donnée
        if($total_row==1){
     
        $_SESSION['info']=$statement->fetch();
     
        }else{
            echo '<b> mot de passe </b> ou <b> Email </b> incorrecte';
        };
    }


}
    
