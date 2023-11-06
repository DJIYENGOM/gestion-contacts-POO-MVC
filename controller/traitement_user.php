<?php
include_once("../model/user.php");
if (!empty( $_SESSION['info'])){

    $id_user = $_SESSION['info'][0];}

$error=[]; 
if(isset($_POST['inscription'])){
   $nom=htmlspecialchars($_POST['nom']);
   $email=htmlspecialchars($_POST['email']);
   $password=(md5($_POST['password']));
   $password_con=(md5($_POST['password_con']));

   if(empty($nom)||empty($email)||empty($password)||empty($password_con)){
    $error[]="tous les champs sont obligatoires";
   }elseif(!(preg_match("/[a-zA-Zéè]$/", $_POST["nom"]))  ){
     $error[]= 'nom incorrecte';
    }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) ) {
   
                if (strlen($password) >= 5 && $password == $password_con) {

                    $user = new Utilisateurs();
                    $user->Inscription($var,$nom,$email,$password);
                    //header("Location: ../view/page1.php");
                    echo '<a href="../view/page1.php">connectez</a>';

                }
        }
}

if(isset($_POST['connexion'])){
    $email=trim($_POST['email']); //trim permet de supprimer les espaces en debut et fin d'une chaine caractere
    $password=(md5($_POST['password']));
    
    $user = new Utilisateurs();
    $user->Connexion($var,$email,$password);
    header("Location:../view/listeContact.php");

   
    }
        
?>
