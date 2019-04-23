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

if(isset($_FILES['avatar']))
{
     $dossier = 'upload/';
     $fichier = basename($_FILES['avatar']['name']);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>phpp7e7</title>
</head>
<body>
  <?php
  if (empty($_POST) || isset($errorFirstname) || isset($errorLastname)){
      ?>
    <form class="" action="index.php" method="POST" enctype="multipart/form-data">
      <label for="lastname">Nom : </label>
      <input type="text" name="lastname" />

      <label for="firstname">Prénom : </label>
      <input type="text" name="firstname" />

     <input type="file" name="fichier" name="envoyer" value="Envoyer le fichier">




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
