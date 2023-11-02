<?php
include_once("../model/Contact.php");
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

?>