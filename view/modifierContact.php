<?php
include_once("../model/Contact.php");
// Vérifiez si l'ID du contact est défini dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contact = Contact::getContactById($var, $id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Contact</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h1 {
    background-color:#007BFF;
    color: #fff;
    text-align: center;
    padding: 10px;
}

form {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 20px;
    max-width: 400px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: #fff url('select-arrow.png') no-repeat 95% 50%;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #555;
}

p {
    color: #f00;
    text-align: center;
}
    </style>
</head>
<body>
<h1>Modifier un Contact</h1>

<?php if (isset($contact)) : ?>
    <form method="post" action="../controller/traitementModification.php">
            <input type="hidden" name="id" value="<?php echo $contact->getId(); ?>">
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" value="<?php echo $contact->getPrenom(); ?>"><br>

        <label for="nom">Nom:</label>
        <input type="text" name="nom" value="<?php echo $contact->getNom(); ?>"><br>

        <label for="numero">Numéro:</label>
        <input type="text" name="numero" value="<?php echo $contact->getNumero(); ?>"><br>

        <label for="favori">Favori:</label>
        <select name="favori">
            <option value="oui" <?php if ($contact->getFavori() == 'oui'); ?>>Oui</option>
            <option value="non" <?php if ($contact->getFavori() == 'non'); ?>>Non</option>
        </select><br>

        <input type="submit" name="modifier" value="Modifier">
    </form>
<?php else : ?>
    <p>Contact introuvable.</p>
<?php endif; ?>

</body>
</html>
