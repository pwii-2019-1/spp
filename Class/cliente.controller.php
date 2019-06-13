<?php

include_once 'cliente.service.php';
include_once 'conexao.php';

$acao = filter_input(INPUT_GET, 'acao') ? filter_input(INPUT_GET, 'acao') : $acao;
  if ($acao == 'inserir') {

    $cliente = new Cliente();
    $cliente->__set('nome', filter_input(INPUT_POST, 'nome'));
    $cliente->__set('cpf', filter_input(INPUT_POST, 'cpf'));
    $cliente->__set('rg', filter_input(INPUT_POST, 'rg'));
    $cliente->__set('sexo', filter_input(INPUT_POST, 'sexo'));
    $cliente->__set('dataNascimento', filter_input(INPUT_POST, 'dataNascimento'));
    $cliente->__set('tel', filter_input(INPUT_POST, 'tel'));
    $cliente->__set('email', filter_input(INPUT_POST, 'email'));
    $cliente->__set('logradouro', filter_input(INPUT_POST, 'logradouro'));
    $cliente->__set('bairro', filter_input(INPUT_POST, 'bairro'));
    $cliente->__set('cidade', filter_input(INPUT_POST, 'cidade'));
    $cliente->__set('estado', filter_input(INPUT_POST, 'estado'));
    $cliente->__set('cep', filter_input(INPUT_POST, 'cep'));

    $clienteService = new ClienteService();
    $clienteService->inserirCliente($cliente);
    header('Location: ../projeto/cadastroCliente.php#topo');
  } else if ($acao == 'excluir') {
      $cs = new ClienteService();
}

?>
