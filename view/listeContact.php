<?php
include_once("../model/Contact.php");

// Récupérer la liste des numéros depuis la base de données
$contacts = Contact::getAllContacts($var);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
<style>
 
table {
    border-collapse: collapse;
    width: 50%;
    margin-left: 25%;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #007BFF;
    color: white;
}

td a {
    text-decoration: none;
    color: #007BFF;
}

/* Bouton de suppression (rouge) */
td .btn-supprimer {
    background-color: #FF6347; /* Couleur rouge */
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Bouton de modification (vert) */
td .btn-modifier {
    background-color: #4CAF50; /* Couleur verte */
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

</style>
    <h1>Liste des Contacts</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Numéro</th>
            <th>Favori</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $contact) : ?>
            <tr>
                <td><?php echo $contact['id_contact']; ?></td>
                <td><?php echo $contact['prenom']; ?></td>
                <td><?php echo $contact['nom']; ?></td>
                <td><?php echo $contact['numero']; ?></td>
                <td><?php echo $contact['favori']; ?></td>
                <td>
                    <a href="modifierContact.php?id=<?php echo $contact['id_contact']; ?>"><button class="btn-modifier">Modifier</button></a>  
                    <a href="../controller/traitementSuppression.php ?id=<?php echo $contact['id_contact']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')"><button class="btn-supprimer">Supprimer</button></a>
                
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
