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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/apprenants.css">
    <title>Apprenants-Gestion-Simplon</title>
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
      <li><a href="index.php">ACCUEIL</a></li>
      <li id="actif"><a href="apprenants.php">APPRENANTS</a></li>
      <li><a href="tuteurs.php">TUTEURS</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>

<div id="global">
  <div class="fils" id="liste">
  <h1 id="bienvenu">Liste des Apprenants</h1>
<div class="table-responsive-sm">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">N°</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date naissance</th>
      <th scope="col">Genre</th>
      <th scope="col">Ville Origine</th>
      <th scope="col">Formation</th>
      <th scope="col">Etablissement</th>
      <th scope="col">Tuteur</th>
      <th scope="col">Contact</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <?php
    try
    {
  
    $sql = bd()->query('SELECT * FROM apprenants ORDER BY nom ASC');
    $i=0;
    while ($donnees = $sql->fetch())

    {

        if ($donnees['id_tuteur']){
          $reqtuteur = bd()->query("SELECT nom,prenom FROM tuteurs WHERE id_tuteur=$donnees[id_tuteur]");
          while ($tut =$reqtuteur->fetch()){

          $nom=$tut['nom'];
          $prenom=$tut['prenom'];
          }
        }
        $i++;
        echo "<tr>";
        echo "<td> $i </td>";
        echo "<td> $donnees[nom] </td>";
        echo "<td> $donnees[prenom] </td>";
        echo "<td> $donnees[date_naiss] </td>";
        echo "<td> $donnees[genre] </td>";
        echo "<td> $donnees[ville] </td>";
        echo "<td> $donnees[formation] </td>";
        echo "<td> $donnees[etabliss] </td>";
        echo "<td>".$nom."     ".$prenom."</td>";
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
<div class="buttonap">
     <button type="button" class="btn btn-danger btn-valid">Imprimer</button>
     <button type="button" class="btn btn-danger btn-valid" onclick="afficher('formulaire')">Nouveau</button>
</div>
  </div>
<div class="fils" id="formulaire">
  <h1 id="bienvenu">Formulaire Apprenants</h1>
  
    <form action="insertion-apprenants.php"method="post"> 
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="nom" placeholder="Nom" required ="required">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="prenom" placeholder="Prénom" required ="required">
    </div>
  </div><br>
  <div class="row">
    <div class="col">
      <input type="date" class="form-control" name="d_naiss" placeholder="Date de naissance" required ="required">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="v_origine" placeholder="Ville d'origine" required ="required">
    </div>
  </div><br>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="formation" placeholder="Formation" required ="required">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="e_precedante" placeholder="Etablicement précédante" required ="required">
    </div>
  </div><br>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="contact" placeholder="Contact" required ="required">
    </div>

    <div class="form-group col-md-6">
      <select id="inputState" class="form-control" name="tuteur" required ="required">
        <!-- <option selected>Selectioner son tuteur </option> -->
      <?php
      $requette = bd()->query('SELECT * FROM tuteurs ORDER BY nom, prenom ASC');
      while ($donnees = $requette->fetch())
     {
      echo '<option value="' . $donnees['id_tuteur'] . '">' . $donnees['nom'] . " - " . $donnees['prenom'] . " - " . $donnees['profession'] . " - " . $donnees['contact']. '</option>';
     }
    //  $resultat->closeCursor();
     ?>
     <option onclick="versFormtTuteur();">Nouveau tuteur</option>
      </select>
    </div>
  </div><br>
  <label>Genre:</label>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="Masculin">
  <label class="form-check-label" for="inlineRadio1">Masculin</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="Femme">
  <label class="form-check-label" for="inlineRadio2">Feminin</label>
</div>
  <div class="form-row">
    <div class="form-group row-md-6">
      <div id="photo"><img id="profil" class="iconapp" src="images/icon.jpg"></div>
    </div> 
  </div>
  <input type="file" class="form-controlb" id="inputPassword4" oninput="afficherPhoto(this,'profil')">
  <div class="buttonap">
    <input id="sendTuteurs" type="submit" value="Ajouter" name="valider" class="btn btn-danger sbouton2">
    <button type="button" class="btn btn-danger" onclick="afficher('liste')">Annuler</button>
  </div>
</form>
    </div>
   <div class="fils" id="details"></div>
</div>
<div id="footer">
	<h4 style="color:white;">COPYRIGHT SIMPLON 2020</h4>
</div>
</div>
<script type="text/javascript" src="js/navigateur.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/details.js"></script>
<script type="text/javascript">
  afficher('formulaire');
</script>
</body>
</html>