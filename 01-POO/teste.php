<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Endereco;

$endereco = new Endereco('Bento Gonçalves', 'Limoeiro', 'Rua de cima', '787');
$titular = new Titular('Gustavo Schneider', new Cpf('034.970.120-25'), $endereco);
$conta = new Conta($titular);
$conta->depositar(100);
echo $conta->getNomeTitular() . PHP_EOL;
echo $conta->getCpfTitular() . PHP_EOL;
echo $conta->getSaldo() . PHP_EOL;

var_dump($conta);
