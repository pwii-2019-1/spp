<?php

include_once 'venda.service.php';
include_once 'conexao.php';

$acao = filter_input(INPUT_GET, 'acao') ? filter_input(INPUT_GET, 'acao') : $acao;
  if ($acao == 'inserir') {

    $venda = new Venda();
    $venda->__set('idvenda', filter_input(INPUT_POST, 'idvenda'));
    $venda->__set('idcliente', filter_input(INPUT_POST, 'idcliente'));
    $venda->__set('idcolaborador', filter_input(INPUT_POST, 'idcolaborador'));
    $venda->__set('descontoTotal', filter_input(INPUT_POST, 'descontoTotal'));
    $venda->__set('valorTotal', filter_input(INPUT_POST, 'valorTotal'));
    $venda->__set('condicaoPgto', filter_input(INPUT_POST, 'condicaoPgto'));

    $vendaService = new vendaService();
    $vendaService->inserirVenda($venda);
    header('Location: cadastroVenda.php#topo');
  } else if ($acao == 'excluir') {
      $vs = new vendaService();
}

?>
