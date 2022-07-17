<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>LISTE HOMME</title>
</head>
<body background="0909.jpg">
	
 <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(100,100,100,0.6);">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.html"><img src="Marrakechicon.jpg" width="50" height="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Ajoutathlete.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="maj.php">Mise a jour</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Liste des Athlete
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="hommelist.php">HOMMES</a></li>
            <li><a class="dropdown-item" href="femmelist.php">FEMMES</a></li>
          </ul>
        </li>
        <li class="nav-item">
 <a class="nav-link active" aria-current="page" href="Supprimerathlete.php">Supprimer Athlete</a>
         </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            RESULTAT
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="RESULTATHOMME.php">HOMMES</a></li>
            <li><a class="dropdown-item" href="RESULTATFEMME.php">FEMMES</a></li>
          </ul>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
	<?php
  try {
    $conn = new PDO("mysql:host = localhost;
                      dbname=marathon", "root", "");
    $conn ->setAttribute(PDO::ATTR_ERRMODE, 
                        PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("ERROR: Could not connect. ".$e->getMessage());
}
try {
    $sql = "SELECT * FROM athlete where SEXE='H' ";
    $res = $conn ->query($sql);
    if ($res->rowCount() > 0) {
    	echo "<div class='container' >";
        echo "<table  class='table' style='background-color: rgba(300,300,300,0.6);' >";
        echo "<tr>";
        echo "<th>NOM</th>";
        echo "<th>PRENOM</th>";
        echo "<th>Age</th>";
        echo "<th>Pays</th>";
        echo "<th>Meilleur Chrono</th>";
        echo "</tr>";
        while ($row = $res->fetch()) {
            echo "<tr>";
            echo "<td>".$row['NOM']."</td>";
            echo "<td>".$row['PRENOM']."</td>";
            echo "<td>".$row['AGE']."</td>";
            echo "<td>".$row['PAYS']."</td>";
            echo "<td>".$row['meilchrono']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        unset($res);
    }
    else {
       ?>
       <div style="width:500px; color: red;background-color: beige;position: absolute;top: 200px;left: 500px;">
  <p align="center"><img src="png-clipart-symbol-information-logo-sign-stop-miscellaneous-text.png" width="100px"><br>n'est pas d'athlete</p>
  </div>
  <?php
    }
}
catch (PDOException $e) {
    die("ERROR: tu ne doit execute $sql. ".$e->getMessage());
}
unset($conn);
	?>
     </div>
</body>
</html>