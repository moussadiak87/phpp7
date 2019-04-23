<?php
$patternName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';

$formErrors = array();

if (count($_POST) > 0) {
  if (!empty($_POST['lastName'])) {
    if (preg_match($patternName, $_POST['lastName'])) {
      $lastName = htmlspecialchars($_POST['lastName']);
    } else {
      $formErrors['lastName'] = 'Vôtre nom de famille est incorrect';
    }
  } else {
    $formErrors['lastName'] = 'Veuillez renseigner votre nom de famille';
  }

  if (!empty($_POST['firstName'])) {
    if (preg_match($patternName, $_POST['firstName'])) {
      $firstName = htmlspecialchars($_POST['firstName']);
    } else {
      $formErrors['firstName'] = 'Vôtre prénom est incorrect';
    }
  } else {
    $formErrors['firstName'] = 'Veuillez renseigner votre prénom';
  }

  if (!empty($_POST['title'])) {
    if ($_POST['title'] === 'Monsieur' || $_POST['title'] === 'Madame') {
      $title = $_POST['title'];
    } else {
      $formErrors['title'] = 'Vôtre civilité est incorrecte';
    }
  } else {
    $formErrors['title'] = 'Veuillez renseigner votre civilité';
  }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Exercice 6 part 7 PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/journal/bootstrap.min.css" />
  </head>
  <body>
    <div class="container">
      <?php
      if (count($_POST) == 0 || count($formErrors) > 0) {
        ?>
        <form method="POST" action="index.php">
          <div class="form-group">
            <label for="lastName">Nom de famille</label>
            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Dupont" required />
              <?php if (isset($formErrors['lastName'])){ ?>
            <div class="alert-danger">
              <p><?= $formErrors['lastName']?></p>
            </div>
              <?php } ?>
          </div>
          <div class="form-group">
            <label for="firstName">Prénom</label>
            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Jean" required />
          </div>
          <div class="form-group">
            <label for="title">Civilité</label>
            <select name="title" class="form-control" id="title" required>
              <option disabled selected>Veuillez faire un choix !</option>            
              <option value="Monsieur">Monsieur</option>
              <option value="Madame">Madame</option>
            </select>
          </div>
          <input type="submit" name="submit" value="Envoyer" class="btn btn-primary" />
        </form>
        <?php
      } else {
        
      }
      ?>
    </div>
  </body>
</html>