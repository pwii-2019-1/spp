<?php

include_once 'venda.model.php';
include_once 'conexao.php';

class vendaService {
    
    private $conexao;

    
    public function __construct(){

        $this->conexao = Conexao::conectar();
    }
    
    public function IncluirVenda(Venda $venda){
        
        $sql = "INSERT INTO venda (idcliente, idcolaborador, descontoTotal, valorTotal, condicaoPgto, dataCompra)"
            ." VALUES (:cliente, :colaborador, :descontoTotal, :valorTotal, :condicaoPgto, NOW())";        

        $sttm = $this->conexao->prepare($sql);
        
        // Acesso direto ao objeto cliente quando a classe cliente e colaborador estiver pronta
        // $sttm-> bindValue(':cliente',$venda-> __get('cliente')-> __get('id'));
                      
        $sttm-> bindValue(':cliente',$venda-> __get('cliente'));
        $sttm-> bindValue(':colaborador',$venda-> __get('colaborador'));
        $sttm-> bindValue(':descontoTotal', $venda-> __get('descontoTotal'));
        $sttm-> bindValue(':valorTotal', $venda-> __get('valorTotal'));
        $sttm-> bindValue(':condicaoPgto',$venda-> __get('condicaoPgto'));

        try {
            $sttm->execute();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
}


$v = new Venda(1, 1, 5, 20, "Vista");

// echo "<pre>";
// print_r($v);
// echo "</pre>";
// echo $v-> __get('codCliente');


$vs = new vendaService();
$vs->IncluirVenda($v);

// echo "<pre>";
// print_r($vs);
// echo "</pre>";


// vendaService::IncluirVenda($v)

 
// print_r(vendaService::conexao);

?>