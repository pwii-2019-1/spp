<?php

class Venda{
    
    private $cliente;
    private $colaborador;
    private $descontoTotal;
    private $valorTotal;
    private $condicaoPgto;
        
    public function __construct($cliente, $colaborador, $descontoTotal, $valorTotal, $condicaoPgto){
        $this-> cliente = $cliente;
        $this-> colaborador = $colaborador;
        $this-> descontoTotal = $descontoTotal;
        $this-> valorTotal = $valorTotal;
        $this-> condicaoPgto = $condicaoPgto;
        
    }
    
    // Get e Set OverLoading
    function __set($atributo, $valor){
        $this-> $atributo = $valor;
    }

    function __get($atributo){
        return $this->$atributo;
    }   
   
}

/*$teste = new Venda();
$teste -> __set("codCliente", 1);
$teste -> __set("codColaborador", 1);
$teste -> __set("descontoTotal", 1.50);
$teste -> __set("valorTotal", 10);
$teste -> __set("condicaoPgto", "a Vista");

echo $teste -> __get('codCliente') . $teste -> __get('codColaborador') . 
$teste -> __get('descontoTotal'). $teste -> __get('valorTotal') . 
$teste -> __get('condicaoPgto');*/

?>