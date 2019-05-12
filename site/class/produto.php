<?php

class Produto {

    private $descricao;
    private $numeracao;
    private $genero;
    private $cor;
    private $marca;
    private $valorUnitario;
    private $saldoProduto;

    //alterar os tipos para date no Diagrama de classe
    public function __construct($descricao, $numeracao, $genero, $cor, $marca, $valorUnitario, $saldoProduto) {
        $this->descricao = $descricao;
        $this->numeracao = $numeracao;
        $this->genero = $genero;
        $this->cor = $cor;
        $this->marca = $marca;
        $this->valorUnitario = $valorUnitario;
        $this->saldoProduto = $saldoProduto;
    }

    //metodos get e sets
    public function __set($atrib, $value) {
        $this->$atrib = $value;
    }

    public function __get($atrib) {
        return $this->$atrib;
    }

}


