<?php

class Venda{
    
    private $cliente;           //Atributo que ira receber o objeto Cliente.
    private $colaborador;       //Atributo que ira receber o objeto Colaborador.
    private $descontoTotal=0;   // Este atributo não esta no contrutor porque é calculado no metodo calcularValorDescontoTotal
    private $valorTotal=0;      // Este atributo não esta no contrutor porque é calculado no metodo calcularValorTotalVenda
    private $condicaoPgto;
    private $itens = [];        //Array para incluir os itens dos pedidos.
   
        
    public function __construct($cliente, $colaborador, $condicaoPgto){
        $this-> cliente = $cliente;
        $this-> colaborador = $colaborador;
        $this-> condicaoPgto = $condicaoPgto;
        
    }
    
    // Get e Set OverLoading
    function __set($atributo, $valor){
        $this-> $atributo = $valor;
    }

    function __get($atributo){
        return $this->$atributo;
    }   
    
    //Metodo que calcula o valor total da venda (Soma os valores total dos itens)    
    public function calcularValorTotalVenda(){
        $total=0;
        foreach ($this->__get('itens') as $item) {
            $total = $total + ($item->__get('valorTotalItem'));
        }
        
        $this->valorTotal = $total;
    }
    
    //Metodo que calcula o valor total dos descontos da venda (Soma os valores total dos descontos dos itens)
    public function calcularValorDescontoTotal(){
        $desconto=0;
        foreach ($this->__get('itens') as $item){
            $desconto = $desconto + ($item->__get('descontoItem'));
        }
        
        $this->descontoTotal = $desconto;
    }
    
    public function addItens($itemVenda){
        $this->itens[] = $itemVenda;
        $this->calcularValorTotalVenda();
        $this->calcularValorDescontoTotal();
    }
   
}

?>