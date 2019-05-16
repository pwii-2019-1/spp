<?php
  class ItemVenda{
    private $codVenda;
    private $qtdProduto;
    private $descontoItem;
    private $valorTotalItem;
    private $produto;

      public function __construct($codVenda, $qtdProduto, $descontoItem, $valorTotalItem, $produto){
        $this-> codVenda = $codVenda;
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
