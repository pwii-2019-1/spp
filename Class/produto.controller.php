<?php

require 'produto.service.php';

$acao = filter_input(INPUT_GET, 'acao') ? filter_input(INPUT_GET, 'acao') : $acao;

if ($acao == 'inserir') {
    echo filter_input(INPUT_POST, 'descricao');
    $produto = new Produto();
    $produto->__set('descricao', filter_input(INPUT_POST, 'descricao'));
    $produto->__set('numeracao', filter_input(INPUT_POST, 'numeracao'));
    $produto->__set('genero', filter_input(INPUT_POST, 'genero'));
    $produto->__set('cor', filter_input(INPUT_POST, 'cor'));
    $produto->__set('marca', filter_input(INPUT_POST, 'marca'));
    $produto->__set('valorUnitario', filter_input(INPUT_POST, 'valorUnitario'));
    $produto->__set('saldoProduto', filter_input(INPUT_POST, 'saldoProduto'));
    //echo $produto;
    $conexao = new Conexao();
    $produtoService = new ProdutoService($conexao, $produto);
    $produtoService->salvarProduto();
// header('Location: ./../projetoTelas/cadastroProduto.html');
} else if ($acao == 'polularTabela') {

    $conn = new Conexao();
    $p = new Produto();
    $ps = new ProdutoService($conn, $p);

    while ($linha->fetch(PDO::FETCH_OBJ)) {
        //echo $linha['numeracao'];
        echo "<tr><th scope=\"row\">"
        . $linha->idproduto . "</th> <td>" . $linha->descricao . "</td>
                                    <td>" . $linha->numeracao . "</td>
                                    <td>" . $linha->genero . "</td>
                                    <td>" . $linha->cor . "</td>
                                    <td>" . $linha->marca . "</td>
                                    <td>" . $linha->valorUnitario . "</td>
                                    <td>" . $linha->saldoProduto . "</td>
                                    <td>" . $linha->dataCadastro . "</td>
                                  </tr>";
    }
}

   