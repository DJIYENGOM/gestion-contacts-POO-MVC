<?php
include_once("../model/Contact.php");

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

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