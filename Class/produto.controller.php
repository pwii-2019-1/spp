<?php

require 'produto.service.php';

$acao = filter_input(INPUT_GET, 'acao') ? filter_input(INPUT_GET, 'acao') : $acao;
echo $acao;
if ($acao == 'inserir') {
    
    $produto = new Produto();
    $produto->__set('descricao', filter_input(INPUT_POST, 'descricao'));
    $produto->__set('numeracao', filter_input(INPUT_POST, 'numeracao'));
    $produto->__set('genero', filter_input(INPUT_POST, 'genero'));
    $produto->__set('cor', filter_input(INPUT_POST, 'cor'));
    $produto->__set('marca', filter_input(INPUT_POST, 'marca'));
    $produto->__set('valorUnitario', filter_input(INPUT_POST, 'valorUnitario'));
    $produto->__set('saldoProduto', filter_input(INPUT_POST, 'saldoProduto'));

    $conexao = new Conexao();
    $produtoService = new ProdutoService($conexao, $produto);
    $produtoService->salvarProduto();
   // header('Location: ./../projetoTelas/cadastroProduto.html');
}