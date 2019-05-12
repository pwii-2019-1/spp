<?php

include_once './DB.php';
include_once './produto.php';

class ProdutoDB {
    public static function salvarProduto(Produto $p) {
        $conn = DB::getConnection();
        $sql = "INSERT INTO produto (cor,datacadastro,descricao,genero,marca,numeracao,saldoProduto,valorUnitario)"
                . " VALUES (:cor, NOW(), :desc, :gen,  :marca, :num, :saldo, :valor)";

        $sttm = $conn->prepare($sql);
        $sttm->bindValue(':cor', $p->cor);
        $sttm->bindValue(':desc', $p->descricao);
        $sttm->bindValue(':gen', $p->genero);
        $sttm->bindValue(':marca', $p->marca);
        $sttm->bindValue(':num', $p->numeracao);
        $sttm->bindValue(':saldo', $p->saldoProduto);
        $sttm->bindValue(':valor', $p->valorUnitario);

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }  
    }
}
