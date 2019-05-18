<?php

  include_once 'pessoa.model.php';

  class Cliente extends Pessoa {
    //private $dataUltimaCompra;

  public function __construct() {
    parent::__construct($nome = null, $cpf = null, $rg = null, $sexo = null, $dataNascimento = null, $tel = null, $email = null, $logradouro = null, $bairro = null, $cidade = null, $estado = null, $cep = null);
      //$this->dataUltimaCompra = $dataUltimaCompra;
    }

      // Get e Set OverLoading
      /*public function __get($atributo) {
        return $this->$atributo;
      }

      public function __set($atributo, $valor) {
        $this->$atributo = $valor;
      }*/

}

/*$teste = new Cliente();
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
$teste -> __set("dataUltimaCompra", "18/05/2019");

echo "<pre>";
print_r($teste);
echo "</pre>";

echo $teste -> __get('nome') . $teste -> __get('cpf') .
$teste -> __get('rg'). $teste -> __get('sexo') .
$teste -> __get('dataNascimento'). $teste -> __get('tel').
$teste -> __get('email') . $teste -> __get('logradouro').
$teste -> __get('bairro') . $teste -> __get('cidade').
$teste -> __get('estado') . $teste -> __get('cep').
$teste -> __get('dataUltimaCompra');*/

?>
