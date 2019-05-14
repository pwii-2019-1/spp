<?php
include_once './produto.controller.php';
include_once './produto.model.php';
include_once './conexao.php';

class ProdutoService {

    private $conexao;
    private $produto;

    public function __construct(Conexao $conexao, Produto $aluno) {
        $this->conexao = $conexao->conectar();
        $this->produto = $aluno;
    }

    public static function salvarProduto() {
        $sql = "INSERT INTO produto (cor,datacadastro,descricao,genero,marca,numeracao,saldoProduto,valorUnitario)"
                . " VALUES (:cor, NOW(), :desc, :gen,  :marca, :num, :saldo, :valor)";

        $sttm = $this->conexao->prepare($sql);
        $sttm->bindValue(':cor', $this->produto->__get('cor'));
        $sttm->bindValue(':desc', $this->produto->__get('desc'));
        $sttm->bindValue(':gen', $this->produto->__get('gen'));
        $sttm->bindValue(':marca', $this->produto->__get('marca'));
        $sttm->bindValue(':num', $this->produto->__get('num'));
        $sttm->bindValue(':saldo', $this->produto->__get('saldo'));
        $sttm->bindValue(':valor', $this->produto->__get('valor'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
?>
<?php
$pdo = new Conexao();
$p = new Produto("Tenis Zoom", 34, "M", "branco", "nike", 500, 9);
$ps = new ProdutoService($pdo, $p);
$ps->salvarProduto();
