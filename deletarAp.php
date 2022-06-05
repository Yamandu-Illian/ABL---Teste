<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'APARTAMENTO');

use \APP\entidades\Apartamento;

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

if($Ap->fk_morador != NULL){
  header('location: index.php?status=erroMorador');
  exit;
}

//VALIDAÇÃO DAS ENTRADAS
if(isset($_POST['excluir'])){
  
  $Ap->excluir();
  
  header('location: index.php?status=success');
  exit;

}

include __DIR__.'/formulario/header.php';
include __DIR__.'/formulario/confirmarDelete.php';
include __DIR__.'/formulario/footer.php';


?>