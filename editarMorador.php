<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar morador');

use \APP\entidades\Apartamento;
use \APP\entidades\Morador;

$apartamentos = Apartamento::getApartamento();

//FAZ A VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=erro');
  exit;
}

$resid = Morador::getMorad($_GET['id']);

//VERIFICAR SE O MORADOR EXISTE
if(!$resid instanceof Morador){
  header('location: index.php?status=erro');
  exit;
}

//VALIDAÇÃO DAS ENTRADAS
if(isset($_POST['cpf'], $_POST['nome'], $_POST['telefone'], $_POST['rg'], $_POST['data_nascimento'], $_POST['email'])){
  //CRIANDO A INSTÂNCIA DO MORADOR
  $resid->cpf = $_POST['cpf'];
  $resid->nome = $_POST['nome'];
  $resid->telefone = $_POST['telefone'];
  $resid->rg = $_POST['rg'];
  $resid->data_nascimento = $_POST['data_nascimento'];
  $resid->email = $_POST['email'];
  
  //CADASTRANDO MORADOR
  $resid->alterar();
  
  if($_POST['num_apartamento'] != ''){

    //BUSCA O APARTAMENTO QUE SERÁ ALOCADO PELO ID
    $Ap = Apartamento::getAp($_POST['num_apartamento']);
    
    //VERIFICAR SE O APARTAMENTO EXISTE
    if($Ap instanceof Apartamento){
      $Ap->dono = $resid->id;
      
      $Ap->alterar();
    }
  }
  header('location: index.php?status=success');
  exit;

}

include __DIR__.'/formulario/header.php';
include __DIR__.'/formulario/formularioMorador.php';
include __DIR__.'/formulario/footer.php';


?>