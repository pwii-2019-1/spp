<?php

include_once 'produto.model.php';
include_once 'conexao.php';

class ProdutoService {

    private $conexao;  

    public function __construct(){
        $this->conexao = Conexao::conectar();
    }

    public function inserirProduto() {
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

    public function getProdutos() {
        $sql = "SELECT * FROM produto";
        $sttm = $this->conexao->prepare($sql);

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
        //return $linha = $sttm->fetch(PDO::FETCH_OBJ);
       // $dados = $conex->query('SELECT nome, email FROM cadastros');
        while ($linha = $sttm->fetch(PDO::FETCH_OBJ)) {
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

}

// $conn = new Conexao();
// $p = new Produto();
// $ps = new ProdutoService();

// $ps->getProdutoByID(1);


// echo "<pre>";
// print_r($ps->getProdutoByID(1));
// echo "</pre>";



?>
<?php

