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
        if ($resul) {
            echo "ok";
        }
        $produto = new Produto();
//        $produto->__set('codigo', )
    }

}

$conn = new Conexao();
$p = new Produto();
$p->__set('cor', "Azul");
$p->__set('descricao', "Tenis nikeeee");
$p->__set('marca', "Nike");
$p->__set('genero', "M");
$p->__set('numeracao', 42);
$p->__set('saldoProduto', 88);
$p->__set('valorUnitario', 400);



$ps = new ProdutoService($conn, $p);
//$ps->salvarProduto();
echo $ps->getProdutoByID(1);
