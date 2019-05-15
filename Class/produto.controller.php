<?php
require 'produto.service.php';
require 'conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'inserir') {
    $produto = new Produto();
    $produto->__set('descricao', $_POST['descricao']);
    $produto->__set('numeracao', $_POST['numeracao']);
    $produto->__set('genero', $_POST['genero']);
    $produto->__set('cor', $_POST['cor']);
    $produto->__set('marca', $_POST['marca']);
    $produto->__set('valorUnitario', $_POST['valorUnitario']);
    $produto->__set('descricao', $_POST['saldoProduto']);

    $conexao = new Conexao();
    $produtoService = new ProdutoService($conexao, $produto);
    $produtoService->salvarProduto();

    //header('Location: novo_prod.php?sucesso=1');
}
