<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un contact</title>
  <style>
    /* style.css */
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5; /* Couleur de fond plus claire */
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .wrapper {
      background: #fff; /* Fond blanc */
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      text-align: center;
      margin: 20px; /* Ajoute de la marge autour du formulaire */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Ombre légère */
    }

    form {
      display: flex;
      flex-direction: column;
    }

    h2 {
      color: #333; /* Couleur du texte plus foncée */
    }

    .input-field {
      margin: 10px 0;
      display: flex;
      flex-direction: column; /* Pour espacer les labels et les champs d'entrée */
    }

    .input-field label {
      color: #333; /* Couleur du texte plus foncée */
      font-size: 16px;
      transition: 0.2s ease all;
      margin-bottom: 5px; /* Ajoute de la marge entre les labels et les champs */
    }

    .input-field input {
      padding: 10px;
      border: none;
      border-bottom: 1px solid #ccc;
      background: transparent;
      color: #333; /* Couleur du texte plus foncée */
      width: 100%;
    }

    .input-field input:focus {
      border-bottom: 1px solid #ff9900;
    }

    .input-field input:valid + label,
    .input-field input:focus + label {
      transform: translateY(-30px);
      font-size: 14px;
      color: #ff9900;
    }

    .input-field label {
      display: block;
    }

    .radio-field {
      display: flex; /* Permet d'aligner les boutons radio horizontalement */
      align-items: center;
      margin-top: 10px; /* Augmente l'espace entre les radios et les autres éléments */
    }

    .radio-field input[type="radio"] {
      margin-right: 5px;
      cursor: pointer;
      transform: scale(1.2); /* Augmente la taille des boutons radio */
    }
    
    .bton-ajouter {
      margin-top: 20px; /* Déplace le bouton "Ajouter" un peu plus bas */
    }

    .bton-ajouter button {
      background: #007BFF; /* Couleur bleue */
      border: none;
      color: #fff;
      padding: 15px;
      border-radius: 0;
      cursor: pointer;
      width: 100%;
    }

    .bton-ajouter button:hover {
      background: #0056b3; /* Couleur bleue légèrement plus sombre au survol */
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <form action="../controller/traitementAjout.php" method="post">
      <h2>Ajouter un contact</h2>

      <div class="input-field">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
      </div>

      <div class="input-field">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
      </div>

      <div class="input-field">
        <label for="numero">Numéro:</label>
        <input type="text" id="numero" name="numero" required>
      </div>

      <div class="radio-field">
        <label for="favori">Ajouter au favori:     </label>
        <input type="radio" id="oui" name="favori" value="oui" required>
        <label for="oui">OUI</label>
        <input type="radio" id="non" name="favori" value="non" required>
        <label for="non">NON</label>
      </div>

      <div class="bton-ajouter">
        <button type="submit" name="ajouter">Ajouter</button>
      </div>
    </form>
  </div>
</body>
</html>
