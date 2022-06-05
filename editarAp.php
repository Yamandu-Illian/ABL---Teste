<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar apartamento');

use \APP\entidades\Apartamento;
use \APP\entidades\Morador;

$residents = Morador::getMorador();

//FAZ A VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=erro');
  exit;
}

$Ap = Apartamento::getAp($_GET['id']);

//VERIFICAR SE O APARTAMENTO EXISTE
if(!$Ap instanceof Apartamento){
  header('location: index.php?status=erro');
  exit;
}

//VALIDAÇÃO DAS ENTRADAS
if(isset($_POST['torre'], $_POST['numero'], $_POST['aluguel'])){
  $Ap->torre   = $_POST['torre'];
  $Ap->numero  = $_POST['numero'];
  $Ap->aluguel = $_POST['aluguel'];

  if($_POST['morador_id'] != ''){
    $Ap->dono = $_POST['morador_id'];
  }
  $Ap->alterar();
  
  header('location: index.php?status=success');
  exit;

}

include __DIR__.'/formulario/header.php';
include __DIR__.'/formulario/formulario.php';
include __DIR__.'/formulario/footer.php';


?>