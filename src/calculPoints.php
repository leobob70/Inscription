<?php
include('header.php');
include('config.php');

session_start();

$goClassBDD = new BDD;

/* Enregistrement dans un cookie du résultat sous format JSON */
$resultatJSON = json_encode($_POST);
$_SESSION['resultatJSON']=$resultatJSON;

/* Déclaration des tableaux contenants les résultats du test */
$ReponseQ1CB = array();
$ReponseQ1RB = "";
$ReponseQ2CB = array();
$ReponseQ2RB = "";
$ReponseQ3CB = array();
$ReponseQ3RB = "";
$ReponseQ4CB = array();
$ReponseQ4RB = "";
$ReponseQ5CB = array();
$ReponseQ5RB = "";

$count=0;

/* Répartition des résultats dans les tableaux idoines */
foreach ($_POST as $key=>$value) {
  for ($i=1; $i <6 ; $i++) {
    switch ($key) {
      case 'reponseID-CB-1-'.$i:
      array_push($ReponseQ1CB, $value);
      break;
      case 'reponseID-RB-1':
      $ReponseQ1RB = $value;
      break;
      case 'reponseID-CB-2-'.$i:
      array_push($ReponseQ2CB, $value);
      break;
      case 'reponseID-RB-2':
      $ReponseQ2RB =$value;
      break;
      case 'reponseID-CB-3-'.$i:
      array_push($ReponseQ3CB, $value);
      break;
      case 'reponseID-RB-3':
      $ReponseQ3RB = $value;
      break;
      case 'reponseID-CB-4-'.$i:
      array_push($ReponseQ4CB, $value);
      break;
      case 'reponseID-RB-4':
      $ReponseQ4RB = $value;
      break;
      case 'reponseID-CB-5-'.$i:
      array_push($ReponseQ5CB, $value);
      break;
      case 'reponseID-RB-5':
      $ReponseQ5RB = $value;
      break;
      default:
      break;
    }
  }
}

$nbrPoints = 0;

/* Calcul du nombre de points */
$nbrPoints = $goClassBDD->repRBOK($ReponseQ1RB, $nbrPoints);
$nbrPoints = $goClassBDD->repRBOK($ReponseQ2RB, $nbrPoints);
$nbrPoints = $goClassBDD->repRBOK($ReponseQ3RB, $nbrPoints);
$nbrPoints = $goClassBDD->repRBOK($ReponseQ4RB, $nbrPoints);
$nbrPoints = $goClassBDD->repRBOK($ReponseQ5RB, $nbrPoints);

$nbrPoints = $goClassBDD->repCBOK($ReponseQ1CB, $nbrPoints);
$nbrPoints = $goClassBDD->repCBOK($ReponseQ2CB, $nbrPoints);
$nbrPoints = $goClassBDD->repCBOK($ReponseQ3CB, $nbrPoints);
$nbrPoints = $goClassBDD->repCBOK($ReponseQ4CB, $nbrPoints);
$nbrPoints = $goClassBDD->repCBOK($ReponseQ5CB, $nbrPoints);

/* Calcul du pourcentage de réussite */
$pourcentageReussite = ($nbrPoints*100)/5;
?>

<!-- Affichage de la page en fonction des résultats !-->
<?php
if ($nbrPoints>=3) {
  ?>
  <div class="container">
    <div class="row" style="color:green; font-size:40px">
      REUSSITE
    </div>
    <div class="row">
      Vous avez obtenus <?= $nbrPoints ?> réponses justes.
    </div>
    <div class="row">
      Pourcentage de réussite : <?= $pourcentageReussite ?> %
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="formulaire.php"><button type="button" class="btn btn-success">POURSUIVRE</button></a>
    </div>
  </div>
  <?php
}else {
  ?>
  <div class="container">
    <div class="row" style="color:red; font-size: 40px;">
      <strong>ECHEC</strong>
    </div>
    <div class="row">
      Vous avez obtenus <?= $nbrPoints ?> réponses justes.
    </div>
    <div class="row">
      Pourcentage de réussite : <?= $pourcentageReussite ?> %
    </div>
    <div class="row">
      <div class="col-md-12">
        <a href="index.php"><button type="button" class="btn btn-danger">QUITTER</button></a>
      </div>
    </div>
  </div>
  <?php
}
include('footer.php');
?>
