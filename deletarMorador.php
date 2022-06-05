<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'MORADOR');

use \APP\entidades\Morador;
use \APP\entidades\Apartamento;

//FAZ A VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=erro');
  exit;
}

$resid = Morador::getMorad($_GET['id']);

//VERIFICAR SE O MORADOR EXISTE
if(!$resid instanceof MORADOR){
  header('location: index.php?status=erro');
  exit;
}

//VALIDAÇÃO DAS ENTRADAS
if(isset($_POST['excluir'])){
  
  //BUSCA O APARTAMENTO QUE SERÁ ALOCADO PELO ID
  $Aps = Apartamento::getApartamento("fk_morador =".$_GET['id']);
  //VERIFICAR SE O APARTAMENTO EXISTE

  foreach ($Aps as $Ap) {
    //ALTERA O MORADOR DO APARTAMENTO PRA NULLO
    $Ap->dono = NULL;
    
    $Ap->alterar();
  }

  
  $resid->excluir();
  
  header('location: index.php?status=success');
  exit;

}

include __DIR__.'/formulario/header.php';
include __DIR__.'/formulario/confirmarDelete.php';
include __DIR__.'/formulario/footer.php';


?>