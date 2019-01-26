<?php include('header.php');

function get_ip() {
  if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) )
  { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
  elseif( isset($_SERVER['HTTP_CLIENT_IP']) )
  { $ip = $_SERVER['HTTP_CLIENT_IP']; }
  else{ $ip = $_SERVER['REMOTE_ADDR']; }
  return $ip; }

  echo 'ip = '. get_ip();
?>

<div class="container">
  <div class="intro">
    <h2>Bienvenu sur le test de sélection ! </h2>
    <br/>
    <p>
      Vous allez répondre à une série de 5 questions pour vérifier votre niveau d'entrée en formation.<br />
      <br/>
      <strong><u>CONSIGNES</u> :</strong><br />
      <br />
      1. Vous ne pouvez passez le test <strong>qu'une seule fois</strong>.<br/>
      2. Chaque bonne réponse vous octroie un point.<br/>
      3. Chaque mauvaise réponse vous en retire un.<br/>
      4. Vous devez obtenir un total de 5 points.<br/>
      5. Si vous n'obtenez pas le nombre de points exigés, vous ne pourrez plus procéder à votre inscription.<br/>
    </p>
    <br />
    <div class="btn btn-danger btn-lg active commencer">
      COMMENCER LE TEST
    </div>
  </div>
  <div class="test">
  </div>
</div>
<script src="js/main.js" charset="utf-8"></script>