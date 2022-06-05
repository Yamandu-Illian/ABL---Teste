<?php

require __DIR__.'/vendor/autoload.php';

use \APP\entidades\Apartamento;
use \APP\entidades\Morador;

$moradores = Morador::getMorador();
$apartamentos = Apartamento::getApartamento();


include __DIR__.'/formulario/header.php';
include __DIR__.'/formulario/listagem.php';
include __DIR__.'/formulario/footer.php';


?>