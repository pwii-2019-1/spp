<?php

include_once './DB.php';

class ProdutoDB {
    function inserirProduto($descricao, $numeracao, $genero, $cor, $marca, $valorUnitario, $saldoProduto, $dataCadstro) {
        $conn = DB::getConnection();
        $sql = "INSERT INTO produto (cor,"
                . "datacadastro,"
                . "descricao,"
                . "genero,"
                . "marca,"
                . "numeracao,"
                . "saldoProduto,"
                . "valorUnitario) VALUES "
                . "(" . "'" . $cor . "'" . "," . "'" . $dataCadstro . "'" . ',' . "'" . $descricao . "'" . ',' . "'" . $genero .
                "'" . ',' . "'" . $marca . "'" . ',' . $numeracao . ',' . $saldoProduto . ',' . $valorUnitario . ')';
        echo $sql;
        try {
            $conn->exec($sql);
        } catch (PDOException $exc) {
            echo 'Erro:' . $exc->getMessage();
        }
    }

}
