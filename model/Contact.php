<?php
include_once("../config/Database.php");
if (!empty( $_SESSION['info'])){

    $id_user = $_SESSION['info'][0];}

class Contact {
    private $id;
    private $table_name = "contacts";
    private $nom;
    private $prenom;
    private $numero;
    private $favori;
    private $id_user;

    public function __construct($id_user,$prenom,$nom,$numero,$favori) {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setNumero($numero);
        $this->setFavori($favori);
        $this->setId_user($id_user);
    }

    // get et setteur 
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom){
        if(!(preg_match("/[a-zA-Zéè]$/", $nom))  ){
            throw new Exception('nom  incorrecte') ;}else{
         $this->nom= $nom;
        }
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function setPrenom($prenom){
        if(!(preg_match("/[a-zA-Zéè]$/", $prenom))  ){
            throw new Exception('prenom  incorrecte') ;}else{
         $this->prenom= $prenom;
        }
    }
    public function getNumero() {
        return $this->numero;
    }
    public function setNumero($numero) {
        if (preg_match("/^(77|78|76)\d{7}$/",$numero)) {
        $this->numero = $numero;
    }else{echo "numero  incorrecte" ;}
    }

    public function getFavori() {
        return $this->favori;
    }
    public function setFavori($favori) {
        if(isset($favori) == 'oui' ||isset($favori) == 'non') { 
            return
            $this->favori = $favori;
        }else {echo'le champ favori est obligatoire';}
    }
    public function getId_user() {
        return $this->id_user;
    }
    public function setId_user($id_user) {  
        $this->id_user = $id_user;
    }


    
    // Ajouter un contact
    public function ajouterContact($var) {
       
        $query = "INSERT INTO " . $this->table_name . " (id_user,prenom, nom, numero, favori) VALUES (?,?,?,?,?)";
        
        $stmt = $var->prepare($query);
        $stmt->execute(array($this->id_user,$this->prenom, $this->nom, $this->numero, $this->favori));
       
      }

    // Lister tous les contacts
public static function getAllContacts($var,  $id_user) {
    $query = $var->query("SELECT id_contact,id_user, prenom, nom, numero, favori FROM contacts WHERE id_user= $id_user ");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//modification
public static function getContactById($var, $id) {
    $query = "SELECT * FROM contacts WHERE id_contact = ?";
    $stmt = $var->prepare($query);
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $contact = new Contact($row['id_user'],$row['prenom'], $row['nom'], $row['numero'], $row['favori']);
         $contact->setId($row['id_contact']);
        return $contact;
    } else {
        return null;
    }
}

public function modifierContact($var) {
    $query = "UPDATE contacts SET prenom = ?, nom = ?, numero = ?, favori = ? WHERE id_contact = ?";
    $stmt = $var->prepare($query);
        $values = [$this->prenom, $this->nom, $this->numero, $this->favori, $this->id];

        try {
            $result = $stmt->execute($values);
    
            if ($result) {
                echo "La modification a été effectuée avec succès.";
            } else {
                echo "La modification a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur SQL : " . $e->getMessage();
        }
    }
//suppression
            public function supprimerContact($var,$id) {
                $query = "DELETE FROM contacts WHERE id_contact = ?";
                $stmt = $var->prepare($query);
                $stmt->execute([$id]);
            }
}
?>
