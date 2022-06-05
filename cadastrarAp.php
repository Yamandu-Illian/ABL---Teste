<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar apartamento');

use \APP\entidades\Apartamento;
use \APP\entidades\Morador;
$residents = Morador::getMorador();



$Ap = new Apartamento;
//VALIDAÇÃO DAS ENTRADAS
if(isset($_POST['torre'], $_POST['numero'], $_POST['aluguel'])){
  $Ap->torre   = $_POST['torre'];
  $Ap->numero  = $_POST['numero'];
  $Ap->aluguel = $_POST['aluguel'];

  $Ap->cadastrar();
  header('location: index.php?status=success');
  exit;

}

include __DIR__.'/formulario/header.php';
include __DIR__.'/formulario/formulario.php';
include __DIR__.'/formulario/footer.php';


?>