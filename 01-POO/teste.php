<?php

require_once "src/Conta.php";
require_once "src/Titular.php";
require_once "src/Cpf.php";

$titular = new Titular('Gustavo Schneider', new Cpf('034.970.120-25'));
$conta = new Conta($titular);
$conta->depositar(100);
echo $conta->getNomeTitular() . PHP_EOL;
echo $conta->getCpfTitular() . PHP_EOL;
echo $conta->getSaldo() . PHP_EOL;

var_dump($conta);
