<?php

include_once 'produto.service.php';
include_once 'conexao.php';

$acao = filter_input(INPUT_GET, 'acao') ? filter_input(INPUT_GET, 'acao') : $acao;
if ($acao == 'inserir') {
    $produto = new Produto();
    $produto->__set('descricao', filter_input(INPUT_POST, 'descricao'));
    $produto->__set('numeracao', filter_input(INPUT_POST, 'numeracao'));
    $produto->__set('genero', filter_input(INPUT_POST, 'genero'));
    $produto->__set('cor', filter_input(INPUT_POST, 'cor'));
    $produto->__set('marca', filter_input(INPUT_POST, 'marca'));
    $produto->__set('valorUnitario', filter_input(INPUT_POST, 'valorUnitario'));
    $produto->__set('saldoProduto', filter_input(INPUT_POST, 'saldoProduto'));
    $produtoService = new ProdutoService();
    $produtoService->inserirProduto($produto);
    header('Location: ../projetoTelas/cadastroProduto.php#topo');
} else if ($acao == 'editar') {
    $produto = new Produto();
    $produto->__set('codProd', filter_input(INPUT_GET, 'id'));
    $produto->__set('descricao', filter_input(INPUT_POST, 'nomeModal'));
    $produto->__set('numeracao', filter_input(INPUT_POST, 'numeracaoModal'));
    $produto->__set('genero', filter_input(INPUT_POST, 'sexoModal'));
    $produto->__set('cor', filter_input(INPUT_POST, 'corModal'));
    $produto->__set('marca', filter_input(INPUT_POST, 'marcaModal'));
    $produto->__set('valorUnitario', filter_input(INPUT_POST, 'valorunitModal'));
    $produto->__set('saldoProduto', filter_input(INPUT_POST, 'saldoprodModal'));
    $ps = new ProdutoService();
    $ps->alterarProduto($produto);
    header('Location: ../projetoTelas/cadastroProduto.php');
} else if ($acao == 'deletar') {
    $ps = new ProdutoService();
    $ps->deletarProduto(filter_input(INPUT_GET, 'id'));
    header('Location: ../projetoTelas/cadastroProduto.php');
}
