<?php
  class ItemVenda{
    private $venda;
    private $qtdProduto;
    private $descontoItem;
    private $valorTotalItem;
    private $produto;

      public function __construct($venda, $qtdProduto, $descontoItem, $valorTotalItem, $produto){
        $this-> Venda = $venda;
        $this-> qtdProduto = $qtdProduto;
        $this-> descontoItem = $descontoItem;
        $this-> valorTotalItem = $valorTotalItem;
        $this-> produto = $produto;

    }

      function __set($atributo, $valor){
        $this-> $atributo = $valor;
      }

      function __get($atributo){
        return $this->$atributo;
      }

  }

 ?>
