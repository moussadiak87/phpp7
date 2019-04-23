<?php
// Je crée une régex pour securiser les noms saisis dans les inputs.
$patternName = '/^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$/m';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>phpp7e2&4</title>
</head>
<body>
  <?php if(!empty($_POST['firstname'])){
    if(preg_match($patternName, $_POST['firstname'])){
      ?><p><?= $_POST['firstname'] ?></p><?php>
    }else{
      ?><p>Merci de renseigner votre prénom correctement : par une majuscule en 1er</p><?php
    }
  }else{
    ?><p>Merci de renseigner votre prénom.</p><?php>
  }
  ?>

  <?php
  if (!empty($_POST['lastname'])) {
    if (preg_match($patternName, $_POST['lastname'])) {
      ?><p><?= $_POST['lasttname'] ?></p><?php
      >
    } else{
      ?><p>Merci de renseigner votre prénom correctement : par une majuscule en 1er</p><?php
    }
  } else {
    ?><p>Merci de renseigner votre prénom.</p><?php
    >
  }
  ?>
</body>
</html>
