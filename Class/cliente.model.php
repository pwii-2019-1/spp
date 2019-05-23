<?php

include_once 'pessoa.model.php';

class Cliente extends Pessoa {

    private $dataUltimaCompra = null;

    public function __construct($nome, $cpf, $rg, $sexo, $dataNascimento, $tel, $email, $logradouro, $bairro, $cidade, $estado, $cep, $dataUltimaCompra) {
        parent::__construct($nome, $cpf, $rg, $sexo, $dataNascimento, $tel, $email, $logradouro, $bairro, $cidade, $estado, $cep);

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
        $this->__set('dataUltimaCompra', $this->dataUltimaCompra = $dataUltimaCompra);
    }

}

$teste = new Cliente("Joao", "0000000000", "0123", 'M', "19/08/1987", "123456", "Neto@neto", "Rua BBC", "Jd Ana edith", "Jaragua", "GO", "444444", "12/12/12");


echo "<pre>";

print_r($teste);

//formas de acesso 
echo $teste->__get('nome');

echo "</pre>";
