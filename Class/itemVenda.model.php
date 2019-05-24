<?php
  class ItemVenda{
    
    private $qtdProduto;
    private $descontoItem;
    private $valorTotalItem=0;        // Este atributo não esta no construtor porque é calculado no método calcularValorTotalItem
    private $produto;

      public function __construct($qtdProduto, $descontoItem, $produto){
        $this-> qtdProduto = $qtdProduto;
        $this-> descontoItem = $descontoItem;
        $this-> produto = $produto;
    }

      function __set($atributo, $valor){
        $this-> $atributo = $valor;
      }

      function __get($atributo){
        return $this->$atributo;
      }
      
      // Metodo para calcular o valor total do item que é o valor do produto menos o desconto do item.
      public function calcularValorTotalItem(){
                    
          $this->valorTotalItem = ($this->__get('produto')->__get('valorUnitario') - ($this->descontoItem));          
      }
      
     

  }

 ?>
