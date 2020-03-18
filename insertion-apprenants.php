<?php
require_once 'connexion.php';

//On verifie les donnees de reception
$name_a=$_POST['nom'];
$pren_a=$_POST['prenom'];
$date_a=$_POST['d_naiss'];
$genre_a=$_POST['sexe'];
$ville_a=$_POST['v_origine'];
$formation_a=$_POST['formation'];
$etablis_a=$_POST['e_precedante'];
$tuteur_a=$_POST['tuteur'];
$contact_a=$_POST['contact'];
$photo_a=$_FILES['photo'];


$requette2 = bd()->prepare('SELECT * FROM apprenants WHERE contact=?');
$requette2->execute (array($contact_a));
$donnees_exist = $requette2->fetchAll();
if(count ($donnees_exist) == 0 ) {

move_uploaded_file($photo_a['tmp_name'], 'photo/'.$contact_a.'photo.jpg');
$requette=bd()->prepare ('INSERT INTO apprenants(nom, prenom, date_naiss, genre, ville, formation, etabliss, id_tuteur,contact,photo) value(?,?,?,?,?,?,?,?,?,?)');
$requette->execute (array($name_a,$pren_a,$date_a,$genre_a,$ville_a,$formation_a,$etablis_a,$tuteur_a,$contact_a,'photo/'.$contact_a.'photo.jpg'));
header('location:apprenants.php');

}
else {
  
   echo "<script>
   window.location.assign;
   alert('Le contact exist deja!')</script>";
//    header('location:apprenants.php');
}

?>
