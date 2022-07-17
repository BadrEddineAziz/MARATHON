<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="sui.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>ajouter athlete</title>
</head>
<body background="rwe.jpg">
	
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
<table class="r" bgcolor="" width="600px" height="450px" cellpadding="10" cellpadding="5" >
	<form method="post">
	<tr>
		<td><strong>NOM: &nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="nm"  required></td>
	</tr>
	<tr>
		<td><strong>PRENOM:&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="pr" required></td>
	</tr>
	<tr>
		<td><strong>SEXE:</strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="radio" name="sex" value="H" required>HOMME
			&nbsp;&nbsp;<input type="radio" name="sex" value="F" required>FEMME</td>
	</tr>
	<tr>
		<td><strong>AGE:</strong>&nbsp;&nbsp;<input type="number" name="ag" required>&nbsp;&nbsp;
		<strong>PAYS:</strong>&nbsp;&nbsp;<select name="pay" required>
			   <option>...</option>
			   <option>Maroc</option>
            <option>France</option>
            <option>ZAZA2IR</option>
            <option>MALI</option>
            <option>GHANA</option>
            <option>ZAMBAIE</option>
		</select></td>
	</tr>
	<tr>
		<td><strong>MEILLEUR CHRONO: &nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="time" name="mch" required></td>
	</tr>
	<tr>
		<td><strong>LOGIN:</strong>&nbsp;&nbsp;<input type="text" name="lg" required>&nbsp;&nbsp;
		<strong>PASSWORD:</strong>&nbsp;&nbsp; <input type="password" name="pass" required></td>
	</tr>
	<tr>
		<td colspan="4" align="center" class="f"> <input type="submit" name="ok" value="ENREGISTRER" class="btn btn-outline-light" required></td>
	</tr>
	</form>

<?php 

   if (isset($_POST['ok'])) {
   if (isset($_POST['nm'])) {
   	 $nom=$_POST['nm'];
   }
  if (isset($_POST['pr'])) {
  	$prenom=$_POST['pr'];
  }
   if (isset($_POST['sex'])) {
   	 $sex=$_POST['sex'];
   }
  if (isset($_POST['ag'])) {
  	 $age=$_POST['ag'];
  }
  if (isset($_POST['pay'])) {
    $pays=$_POST['pay'];
      }
   if (isset($_POST['mch'])) {
   	$mc=$_POST['mch'];
   }
   if (isset($_POST['lg'])) {
       $log=$_POST['lg'];  
        }
   if (isset($_POST['pass'])) {
    $pw=$_POST['pass'];
   }
   
//ajout de athle
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "marathon";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  //verfier si login et password existe
  $login="SELECT login FROM athlete WHERE login='$log'";
  $l=$conn->query($login);
  $lo=$l->rowCount($l);
  if ($lo==0) {
  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO athlete VALUES (NULL,'$nom', '$prenom', '$sex','$age','$pays','$mc',NULL,'$log','$pw' )";
 
  $conn->exec($sql);
  //RECUPER DOSSARD
  $dossard=$conn->lastinsertid();  ?>
<tr><td style='color: white; background: green;' colspan="4" align="center" >inscrption est valider , votre dossard est:  <?php echo "$dossard"?></td></tr>
  <?php
}
else{ ?>
	<tr><td style='color: white;background-color: darkred;' colspan="4" align="center" >ce athlete existe deja</td></tr>
<?php
}
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

}
?>
</table>
</body>
</html>