<?php

include_once 'produto.model.php';
include_once 'conexao.php';

class ProdutoService {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::conectar();
    }

    public function inserirProduto(Produto $produto) {
        $sql = "INSERT INTO produto (cor,datacadastro,descricao,genero,marca,numeracao,saldoProduto,valorUnitario)"
                . " VALUES (:cor, NOW(), :desc, :gen,  :marca, :num, :saldo, :valor)";
        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':cor', $produto->__get('cor'));
        $sttm->bindValue(':desc', $produto->__get('descricao'));
        $sttm->bindValue(':gen', $produto->__get('genero'));
        $sttm->bindValue(':marca', $produto->__get('marca'));
        $sttm->bindValue(':num', $produto->__get('numeracao'));
        $sttm->bindValue(':saldo', $produto->__get('saldoProduto'));
        $sttm->bindValue(':valor', $produto->__get('valorUnitario'));
        try {
            return $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarProduto(Produto $produto) {
        $sql = "UPDATE produto SET descricao=:desc, numeracao=:num, genero=:gen, cor=:cor, marca=:marca,"
                . "valorUnitario=:valor, saldoProduto=:saldo WHERE idproduto=:id;";
        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':id', $produto->__get('codProd'));
        $sttm->bindValue(':cor', $produto->__get('cor'));
        $sttm->bindValue(':desc', $produto->__get('descricao'));
        $sttm->bindValue(':gen', $produto->__get('genero'));
        $sttm->bindValue(':marca', $produto->__get('marca'));
        $sttm->bindValue(':num', $produto->__get('numeracao'));
        $sttm->bindValue(':saldo', $produto->__get('saldoProduto'));
        $sttm->bindValue(':valor', $produto->__get('valorUnitario'));
        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProdutoByID($id) {
        $sql = "SELECT * FROM produto WHERE idproduto = :id";
        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':id', $id);
        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
        $resul = $sttm->fetchAll(PDO::FETCH_ASSOC);
        $produto = new Produto();
        $produto->__set('codProd', $resul[0]['idproduto']);
        $produto->__set('descricao', $resul[0]['descricao']);
        $produto->__set('numeracao', $resul[0]['numeracao']);
        $produto->__set('genero', $resul[0]['genero']);
        $produto->__set('cor', $resul[0]['cor']);
        $produto->__set('marca', $resul[0]['marca']);
        $produto->__set('valorUnitario', $resul[0]['valorUnitario']);
        $produto->__set('saldoProduto', $resul[0]['saldoProduto']);
        $produto->__set('datacadastro', $resul[0]['datacadastro']);
        return $produto;
    }

    public function deletarProduto($id) {
        $sql = "DELETE FROM produto WHERE idproduto = :id";
        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':id', $id);
        try {
            $sttm->execute();
            echo "$id";
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function populaTabela() {
        $sql = "SELECT * FROM produto";
        $sttm = $this->conexao->prepare($sql);
        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
        return $sttm->fetchAll(PDO::FETCH_ASSOC);
    }

}
