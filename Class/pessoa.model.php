<?php

class Pessoa {

    private $nome;
    private $cpf;
    private $rg;
    private $sexo;
    private $dataNascimento;
    private $tel;
    private $email;
    private $logradouro;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;

    function __construct($nome, $cpf, $rg, $sexo, $dataNascimento, $tel, $email, $logradouro, $bairro, $cidade, $estado, $cep) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->sexo = $sexo;
        $this->dataNascimento= $dataNascimento;
        $this->tel= $tel;
        $this->email = $email;
        $this->logradouro= $logradouro;
        $this->bairro= $bairro;
        $this->cidade = $cidade;
        $this->estado= $estado;
        $this->cep = $cep;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

}
