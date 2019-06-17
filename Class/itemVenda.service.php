<?php
  include_once 'itemVenda.model.php';
  include_once 'conexao.php';

    class ItemVendaService{
        private $conexao;

        public function __construct(){
          $this-> conexao = Conexao::conectar();

        }

        // Metodo para gravar o item da venda no banco de dados itemVenda
        public function inserirItemVenda(ItemVenda $itemVenda, $idVenda){
            $sql = "INSERT INTO itensVenda (qtdProduto, valor, desconto, idvenda, idproduto)"
                ." VALUES (:qtdProduto, :valorTotalItem, :descontoItem, :venda, :produto)";

        $sttm = $this->conexao->prepare($sql);
        $sttm-> bindValue(':qtdProduto',$itemVenda-> __get('qtdProduto'));
        $sttm-> bindValue(':valorTotalItem',$itemVenda-> __get('valorTotalItem'));
        $sttm-> bindValue(':descontoItem', $itemVenda-> __get('descontoItem'));
        $sttm-> bindValue(':venda', $idVenda);
        $sttm-> bindValue(':produto',$itemVenda-> __get('produto')->__get('codProd'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function excluirItemVenda(ItemVenda $itemVenda){
        $sql = 'DELETE FROM itemVenda WHERE idvenda = :idvenda';
        $sql = 'DELETE FROM itemVenda WHERE idproduto = :idproduto';

        $sttm = $this->conexao->prepare($sql);

        $sttm->bindValue(':idvenda',$itemVenda->__get('idvenda'));
        $sttm->bindValue(':idproduto',$itemVenda->__get('idproduto'));

        try {
            $sttm->execute();
            echo 'Itens da venda excluídos com sucesso!';
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            echo 'Erro ao excluir!';
        }
    }

    public function populaTabela() {
        $sql = "SELECT * FROM itensVenda";
        $sttm = $this->conexao->prepare($sql);
        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
        return $sttm->fetchAll(PDO::FETCH_ASSOC);
    }

 }

 ?>
