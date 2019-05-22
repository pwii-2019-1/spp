<?php

include_once './produto.model.php';
include_once './conexao.php';

class ProdutoService {

    private $conexao;
    private $produto;

    public function __construct(Conexao $conexao, Produto $produto) {
        $this->conexao = $conexao->conectar();
        $this->produto = $produto;
    }

    public function salvarProduto() {
        $sql = "INSERT INTO produto (cor,datacadastro,descricao,genero,marca,numeracao,saldoProduto,valorUnitario)"
                . " VALUES (:cor, NOW(), :desc, :gen,  :marca, :num, :saldo, :valor)";

        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':cor', $this->produto->__get('cor'));
        $sttm->bindValue(':desc', $this->produto->__get('descricao'));
        $sttm->bindValue(':gen', $this->produto->__get('genero'));
        $sttm->bindValue(':marca', $this->produto->__get('marca'));
        $sttm->bindValue(':num', $this->produto->__get('numeracao'));
        $sttm->bindValue(':saldo', $this->produto->__get('saldoProduto'));
        $sttm->bindValue(':valor', $this->produto->__get('valorUnitario'));

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
        echo $resul['descricao'];
        print_r($resul);
//        $produto = new Produto();
//        $produto->__set('codigo', )
    }

}

$conn = new Conexao();
$p = new Produto();
$ps = new ProdutoService($conn, $p);
echo $ps->getProdutoByID(5);
