<?php
require_once 'connexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/tuteurs.css">
    <title>Tuteurs-Gestion-Simplon</title>
</head>

<body>
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php"><img class="logo" src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="menu-nav">
      <li ><a href="index.php">ACCUEIL</a></li>
      <li ><a href="apprenants.php">APPRENANTS</a></li>
      <li id="actif"><a href="tuteurs.php">TUTEURS</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>
<div id="global">
  <div class="fils" id="liste"> 
  <h1 id="bienvenu" id="p2">Liste des Tuteurs</h1>
<div class="table-responsive-sm">

<table class="table stable table-bordered">
  <thead class="stable">
    <tr  class="stable1" >
      <th scope="col">N°</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Profession</th>
      <th scope="col">Genre</th>
      <th scope="col">Contact</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>

  <tbody>

    <tr>
    <?php
      try
      {
    
      $sql = bd()->query('SELECT * FROM tuteurs ORDER BY nom ASC');
      $i=0;
        
      while ($donnees = $sql->fetch())
      {
          $i++;
          echo "<tr>";
          echo "<td> $i </td>";
          echo "<td> $donnees[nom] </td>";
          echo "<td> $donnees[prenom] </td>";
          echo "<td> $donnees[profession] </td>";
          echo "<td> $donnees[genre] </td>";
          echo "<td> $donnees[contact] </td>";
          echo "<td><a >Detail</a></td>";
          echo "</tr>";
      }
      $sql->closeCursor();
      }
      catch(Exception $e)
      {
          die('Erreur : '.$e->getMessage());
      }
    ?>
    </tr>
  </tbody>
</table>
</div>
<div class="sbouton1"> 
<button type="button" class="btn btn-danger sbouton2">Imprimer</button>
<button type="button" onclick="afficher('formulaire')" class="btn btn-danger sbouton2">Nouveau</button>
</div>
  </div>
<div class="fils" id="formulaire">

<h1 id="bienvenu">Formulaire des tuteurs</h1>

<form action="insertion2.php" method="POST">
  <div class="form-group">
    <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" placeholder="Nom" required ="required">
  </div>
  <div class="form-group">
    <input type="text" name="prenom" class="form-control" id="exampleFormControlInput1" placeholder="Prénom" required ="required">
  </div>
  <div class="form-group">
    <input type="text" name="profession" class="form-control" id="exampleFormControlInput1" placeholder="Profession" required ="required">
  </div>
  <div class="form-group">
    <input type="number" name="contact" class="form-control" id="exampleFormControlInput1" placeholder="Contact" required ="required">
  </div>
  <label>Genre:</label>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="Masculin">
  <label class="form-check-label" for="inlineRadio1">Masculin</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="Femme">
  <label class="form-check-label" for="inlineRadio2">Feminin</label>
</div><br><br>
  <div class="sbouton1">
    <input id="sendTuteurs" type="submit" value="Ajouter" name="valider" onclick="versFormApprenant()" class="btn btn-danger sbouton2">
    <button type="button" class="btn btn-danger sbouton2"onclick="versFormApprenant()">Annuler</button>
  </div>
</form>
  </div>
   <div class="fils" id="details"></div>
</div>
<div id="footer">
	<h4 style="color:white;">COPYRIGHT SIMPLON 2020</h4>
</div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/navigateur.js"></script>
<script type="text/javascript">
  afficher('formulaire');
</script>
</body>
</html>