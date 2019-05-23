<?php

class Pessoa {
    
    private $codigo;        //Utilizado no Venda.Service para poder gravar no banco venda. (Welliton e Andreia)
    private $nome = null;
    private $cpf = null;
    private $rg = null;
    private $sexo = null;
    private $dataNascimento = null;
    private $tel = null;
    private $email = null;
    private $logradouro = null;
    private $bairro = null;
    private $cidade = null;
    private $estado = null;
    private $cep = null;

    function __construct($nome, $cpf, $rg, $sexo, $dataNascimento, $tel, $email, $logradouro, $bairro, $cidade, $estado, $cep) {
       
        $this->__set('nome', $nome);
        $this->__set('cpf', $cpf);
        $this->__set('rg', $rg);
        $this->__set('sexo', $sexo);
        $this->__set('dataNascimento', $dataNascimento);
        $this->__set('tel', $tel);
        $this->__set('email', $email);
        $this->__set('logradouro', $logradouro);
        $this->__set('bairro', $bairro);
        $this->__set('cidade', $cidade);
        $this->__set('estado', $estado);
        $this->__set('cep', $cep);
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

}
?>
