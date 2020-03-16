<?php
require_once 'connexion.php';

//On verifie les donnees de reception
$name_t=$_POST['nom'];
$pren_t=$_POST['prenom'];
$genre_t=$_POST['sexe'];
$prof_t=$_POST['profession'];
$contact_t=$_POST['contact'];

$requette=bd()->prepare ('INSERT INTO tuteurs(nom, prenom, profession, genre, contact) value(?,?,?,?,?)');
$requette->execute (array($name_t,$pren_t,$prof_t,$genre_t,$contact_t));
header('location:tuteurs.php');
?>

