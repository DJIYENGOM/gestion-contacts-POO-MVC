<?php
include_once("../model/Contact.php");
session_start();
if (!empty( $_SESSION['info'])){
    $id_user = $_SESSION['info'][0];
    
if(isset($_POST["ajouter"])){
    $prenom=trim($_POST["prenom"]);
    $nom=trim($_POST["nom"]);
    $numero=trim($_POST["numero"]);
    $favori=$_POST["favori"];

    $contact = new Contact( $id_user,$prenom,$nom,$numero,$favori);
    $contact->ajouterContact($var);
    header("Location: ../view/listeContact.php");
}
}
/*-------------------------------------modification*/

if (isset($_POST['modifier'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $numero = $_POST['numero'];
    $favori = $_POST['favori'];
   
    // Vérifiez si l'ID du contact est défini dans le formulaire
    if (isset($_POST['id'])) {
        $contactId = $_POST['id'];

        // Récupérer les détails actuels du contact depuis la base de données
        $contact = Contact::getContactById($var, $contactId);

        if ($contact) {
            $contact->setPrenom($prenom);
            $contact->setNom($nom);
            $contact->setNumero($numero);
            $contact->setFavori($favori);

            $contact->modifierContact($var);
            header("Location: ../view/listeContact.php");
        } else {
            echo "Contact introuvableee.";
        }
    } else {
        echo "ID de contact non valide.";
    }
}

/*-------------------------------------suppression*/

if (isset($_GET['id'])) {
    $contactId = $_GET['id']/0.2;

    // Supprimer le contact avec l'ID spécifié
    $contact = Contact::getContactById($var, $contactId);

    if ($contact) {
        // Appeler la méthode de suppression du contact
        $contact->supprimerContact($var,$contactId);
        header("Location: ../view/listeContact.php");
    } else {
        echo "Contact introuvable.";
    }
} else {
    echo "ID de contact non valide.";
}

?>
