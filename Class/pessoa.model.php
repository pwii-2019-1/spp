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

    function __construct() {
      $this->nome = $nome = null;
      $this->cpf = $cpf = null;
      $this->rg = $rg = null;
      $this->sexo = $sexo = null;
      $this->dataNascimento = $dataNascimento = null;
      $this->tel = $tel = null;
      $this->email = $email = null;
      $this->logradouro = $logradouro = null;
      $this->bairro = $bairro = null;
      $this->cidade = $cidade = null;
      $this->estado = $estado = null;
      $this->cep = $cep = null;
    }

    public function __get($atributo) {
      return $this->$atributo;
    }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
    }
}

/*$teste = new Pessoa();
$teste -> __set("nome", "Marcia");
$teste -> __set("cpf", "234.456.879-90");
$teste -> __set("rg", "5234678");
$teste -> __set("sexo", "Feminino");
$teste -> __set("dataNascimento", "20/02/1879");
$teste -> __set("tel", "62 99876-4356");
$teste -> __set("email", "marcia@yahoo.com");
$teste -> __set("logradouro", "Rua Ceres");
$teste -> __set("bairro", "Centro");
$teste -> __set("cidade", "Ceres");
$teste -> __set("estado", "GO");
$teste -> __set("cep", "76.365-000");

echo "<pre>";
print_r($teste);
echo "</pre>";

echo $teste -> __get('nome') . $teste -> __get('cpf') .
$teste -> __get('rg'). $teste -> __get('sexo') .
$teste -> __get('dataNascimento'). $teste -> __get('tel').
$teste -> __get('email') . $teste -> __get('logradouro').
$teste -> __get('bairro') . $teste -> __get('cidade').
$teste -> __get('estado') . $teste -> __get('cep');*/

 ?>
