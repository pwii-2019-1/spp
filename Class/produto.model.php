<?php

class Produto {
    private $codProd;
    private $descricao;
    private $numeracao;
    private $genero;
    private $cor;
    private $marca;
    private $valorUnitario;
    private $saldoProduto;
    private $dataCadastro;
    //metodos get e sets
    public function __set($atrib, $value) {
        $this->$atrib = $value;
    }

    public function __get($atrib) {
        return $this->$atrib;
    }
}
