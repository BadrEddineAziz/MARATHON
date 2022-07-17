<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>MODIFIER ATHLETE</title>
</head>
<body background="Eliud-Kipchoge-159-Attempt-Kit-Nike-Next-Nike-News.jpg">
	 <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgba(100,100,100,0.6);">
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
	<div class="container" style="position: absolute;top: 170px; left: 570px; width: 300px;" >
	<table  class="table table-borderless" height='320px' cellpadding="10" cellpadding="5" style="background-color: rgba(200,200,200,0.7); color: white;" >
	<form method="post">
		<tr align="center">
		<td><strong>DOSSARD:</strong><br><input type="number" name="drd" class="form-control" required></td>
	    </tr>
	    <tr align="center">
		<td><strong>CHRONO:</strong><br><input type="time" name="ch" class="form-control" required></td>
	    </tr>
	    <tr align="center">
		 <td><input type="submit" name="ok" value="VALIDER" class="btn btn-outline-dark" required></td>
	    </tr>
	
	</form>

<?php
 if (isset($_POST['drd'])) {
       $D=$_POST['drd'];  
        }
   if (isset($_POST['ch'])) {
    $chr=$_POST['ch'];
   }
try{
    $conn = new PDO("mysql:host=localhost;dbname=marathon", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
  
try{
	 if (isset($_POST['ok'])) {
  $DOSS="SELECT Dossard FROM athlete WHERE Dossard='$D'";
  $DO=$conn->query($DOSS);
  $DSR=$DO->rowCount($DO);
  if ($DSR==1) {
    $sql = "UPDATE athlete SET chrono='$chr' WHERE Dossard=$D";
    $conn->exec($sql);
echo '<tr><td><div class="alert alert-success" role="alert">La mise a jour valide</div></tr></td>';
}
else{
  echo '<tr><td><div class="alert alert-danger" role="alert">Cet athlete non valide </div></tr></td>'  ;
}
}
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. ". $e->getMessage());
}
unset($conn);
?>