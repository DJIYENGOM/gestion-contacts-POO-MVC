<?php

session_start();   
if (!empty( $_SESSION['info'])){

    $id_user = $_SESSION['info'][0];}
    

include_once("../model/Contact.php");

// Récupérer la liste des numéros depuis la base de données
$contacts = Contact::getAllContacts($var, $id_user);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<style>
    header { 
    background-color:  #007BFF;
    color: white;
    text-align: center;
    padding: 10px;
    font-size: 24px;
    margin-top:0 ;
   
}
 
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
            <header>
                Tous les contacts <h6><i><?= $_SESSION['info'][1]?></i></h6>
            </header>
            <br><br><br>

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
                    <?php $id=$contact['id_contact']*0.2?>

                    <a href="modifierContact.php?id=<?php echo  $id; ?>"><button class="btn-modifier">Modifier</button></a>  
                    <a href="../controller/traitement.php ?id=<?php echo  $id; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')"><button class="btn-supprimer">Supprimer</button></a>
                
                </td>
            </tr>
        <?php endforeach; ?>
        <td colspan="6"><a href="ajouterContact.php">Ajouter contact</a> </td>
    </table>

</body>
</html>
