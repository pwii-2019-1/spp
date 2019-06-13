<?php

include_once 'colaborador.service.php';
include_once 'conexao.php';

$acao = filter_input(INPUT_GET, 'acao') ? filter_input(INPUT_GET, 'acao') : $acao;
  if ($acao == 'inserir') {

    $colaborador = new Colaborador();
    $colaborador->__set('nome', filter_input(INPUT_POST, 'nome'));
    $colaborador->__set('cpf', filter_input(INPUT_POST, 'cpf'));
    $colaborador->__set('rg', filter_input(INPUT_POST, 'rg'));
    $colaborador->__set('sexo', filter_input(INPUT_POST, 'sexo'));
    $colaborador->__set('dataNascimento', filter_input(INPUT_POST, 'dataNascimento'));
    $colaborador->__set('tel', filter_input(INPUT_POST, 'tel'));
    $colaborador->__set('email', filter_input(INPUT_POST, 'email'));
    $colaborador->__set('logradouro', filter_input(INPUT_POST, 'logradouro'));
    $colaborador->__set('bairro', filter_input(INPUT_POST, 'bairro'));
    $colaborador->__set('cidade', filter_input(INPUT_POST, 'cidade'));
    $colaborador->__set('estado', filter_input(INPUT_POST, 'estado'));
    $colaborador->__set('cep', filter_input(INPUT_POST, 'cep'));
    $colaborador->__set('perfil', filter_input(INPUT_POST, 'perfil'));
    $colaborador->__set('senha', filter_input(INPUT_POST, 'senha'));

    $colaboradorService = new ColaboradorService();
    $colaboradorService->inserirColaborador($colaborador);
    header('Location: ../projeto/cadastroColaborador.php#topo');
  } else if ($acao == 'excluir') {
      $cs = new ColaboradorService();
}

?>
