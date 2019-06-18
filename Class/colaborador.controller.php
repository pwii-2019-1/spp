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
  } else if ($acao == 'editar') {
    $colaborador = new Colaborador();
    $colaborador->__set('idcolaborador', filter_input(INPUT_GET, 'idcolaborador'));
    $colaborador->__set('nome', filter_input(INPUT_POST, 'nomeModal'));
    $colaborador->__set('cpf', filter_input(INPUT_POST, 'cpfModal'));
    $colaborador->__set('rg', filter_input(INPUT_POST, 'rgModal'));
    $colaborador->__set('sexo', filter_input(INPUT_POST, 'sexoModal'));
    $colaborador->__set('dataNascimento', filter_input(INPUT_POST, 'dataNascimentoModal'));
    $colaborador->__set('tel', filter_input(INPUT_POST, 'telModal'));
    $colaborador->__set('email', filter_input(INPUT_POST, 'emailModal'));
    $colaborador->__set('logradouro', filter_input(INPUT_POST, 'logradouroModal'));
    $colaborador->__set('bairro', filter_input(INPUT_POST, 'bairroModal'));
    $colaborador->__set('cidade', filter_input(INPUT_POST, 'cidadeModal'));
    $colaborador->__set('estado', filter_input(INPUT_POST, 'estadoModal'));
    $colaborador->__set('cep', filter_input(INPUT_POST, 'cepModal'));
    $colaborador->__set('perfil', filter_input(INPUT_POST, 'perfilModal'));
    $colaborador->__set('senha', filter_input(INPUT_POST, 'senhaModal'));
    $cos = new ColaboradorService();
    $cos->alterarColaborador($colaborador);
    header('Location: ../projetoTelas/cadastroColaborador.php');
} else if ($acao == 'deletar') {
    $cos = new ColaboradorService();
    $cos->excluirColaborador(filter_input(INPUT_GET, 'idcolaborador'));
    header('Location: ../projetoTelas/cadastroColaborador.php');
}
