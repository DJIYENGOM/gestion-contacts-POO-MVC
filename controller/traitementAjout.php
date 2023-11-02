<?php
include_once("../model/Contact.php");

if(isset($_POST["ajouter"])){
    $prenom=$_POST["prenom"];
    $nom=$_POST["nom"];
    $numero=$_POST["numero"];
    $favori=$_POST["favori"];

    $contact = new Contact($prenom,$nom,$numero,$favori);
    $contact->ajouterContact($var);
    header("Location: ../view/listeContact.php");
}

?>
