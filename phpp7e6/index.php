<?php 
if(!empty($_POST)){
    $patternName = '/^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$/m';

  if (isset($_POST['lastname'])) {
    if (preg_match($patternName, $_POST['lastname'])) {
      $lastname = htmlspecialchars($_POST['lastname']);
      echo $_POST['lastname'];
    } else {
      $errorLastname = 'Veuillez indiquer un nom de famille de la forme "Dupont" ';
    }
  } else {
    $errorLastname = 'Veuillez indiquer un nom de famille';
  }
  
  if (isset($_POST['firstname'])) {
    if (preg_match($patternName, $_POST['firstname'])) {
      echo $_POST['firstname'];
      $firstname = htmlspecialchars($_POST['firstname']);
    } else {
      $errorFirstname = 'Veuillez indiquer un prénom de la forme "Henri" ';
    }
  } else { 
        $errorFirstname = 'Veuillez indiquer un nom prénom';
  }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>phpp7e6</title>
</head>
<body>
  <?php
  if (empty($_POST) || isset($errorFirstname) || isset($errorLastname)){
      ?>
    <form class="" action="index.php" method="POST">
      <label for="lastname">Nom : </label>
      <input type="text" name="lastname" />
      
      <label for="firstname">Prénom : </label>
      <input type="text" name="firstname" />
      <select name="choix">
        <option value='choix1'>MR</option>
        <option value="choix2">MME</option>
      </select>
      <input type="submit" value="envoyer" />
    </form>
  <?php  }
  ?>
</body>
</html>
