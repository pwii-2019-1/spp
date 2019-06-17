<?php

include_once 'itemVenda.service.php';
include_once 'conexao.php';

$acao = filter_input(INPUT_GET, 'acao') ? filter_input(INPUT_GET, 'acao') : $acao;
if ($acao == 'inserir') {
    $itemVenda = new ItemVenda();
    $itemVenda->__set('qtdProduto', filter_input(INPUT_POST, 'qtdProduto'));
    $itemVenda->__set('descontoItem', filter_input(INPUT_POST, 'descontoItem'));
    $itemVenda->__set('valorTotalItem', filter_input(INPUT_POST, 'valorTotalItem'));
    $itemVenda->__set('produto', filter_input(INPUT_POST, 'produto'));
    $itemVendaService = new ItemVendaService();
    $itemVendaService->inserirItemVenda($itemVenda);
    header('Location: ../projetoTelas/cadastroItemVenda.php#topo');
} else if ($acao == 'editar') {
    $itemVenda = new Produto();
    $itemVenda->__set('codVenda', filter_input(INPUT_GET, 'idvenda'));
    $itemVenda->__set('codProd', filter_input(INPUT_GET, 'idproduto'));
    $itemVenda->__set('qtdProduto', filter_input(INPUT_POST, 'qtdProdutoModal'));
    $itemVenda->__set('descontoItem', filter_input(INPUT_POST, 'descontoItemModal'));
    $itemVenda->__set('valorTotalItem', filter_input(INPUT_POST, 'valorTotalItemModal'));
    $itemVenda->__set('produto', filter_input(INPUT_POST, 'produto'));
    $ivs = new ItemVendaService();
    $ivs->alterarItemVenda($itemVenda);
    header('Location: ../projetoTelas/cadastroItemVenda.php');
}
