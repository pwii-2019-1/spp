<?php
  include_once 'itemVenda.model.php';
  include_once 'conexao.php';

    class ItemVendaService{
        private $conexao;

        public function __construct(){
          $this-> conexao = Conexao::conectar();

        }

        public function incluirItemVenda(ItemVenda $itemVenda){
            $sql = "INSERT INTO itensVenda (qtdProduto, valor, desconto, idvenda, idproduto)"
                ." VALUES (:qtdProduto, :valorTotalItem, :descontoItem, :venda, :produto)";
        
        $sttm = $this->conexao->prepare($sql);
        
        $sttm-> bindValue(':qtdProduto',$itemVenda-> __get('qtdProduto'));
        $sttm-> bindValue(':valorTotalItem',$itemVenda-> __get('valorTotalItem'));
        $sttm-> bindValue(':descontoItem', $itemVenda-> __get('descontoItem'));
        $sttm-> bindValue(':venda', $itemVenda-> __get('venda'));       
        $sttm-> bindValue(':produto',$itemVenda-> __get('produto'));
        
        try {            
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
        
        
    }

       
 }

$item1 = new ItemVenda(6, 10, 0, 150, 2);

$iv = new ItemVendaService();


$iv->incluirItemVenda($item1);


 ?>
