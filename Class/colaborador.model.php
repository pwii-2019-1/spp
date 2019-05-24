<?php
require_once 'pessoa.model.php';

class Colaborador extends Pessoa
{

    private $perfil;

    private $senha;

    public function __construct($nome, $cpf, $rg, $sexo, $dataNascimento, $tel, $email, $logradouro, $bairro, $cidade, $estado, $cep, $perfil, $senha){
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
        $this->__set('perfil', $perfil);
        $this->__set('senha', $senha);
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}


// $col = new Colaborador("Laila", "234.654.789-09", "5363728", "Feminino", "20/09/1987", "62 98789-0000", "laila@gmail.com", "Rua A", "Jardim Sorriso", "Itapaci", "GO", "76.360-000", "ADM", "123");


// echo "<pre>";
// print_r($col);
// echo "</pre>";


/*
 * $teste = new Colaborador();
 * $teste -> __set("nome", "Marcia");
 * $teste -> __set("cpf", "234.456.879-90");
 * $teste -> __set("rg", "5234678");
 * $teste -> __set("sexo", "Feminino");
 * $teste -> __set("dataNascimento", "20/02/1879");
 * $teste -> __set("tel", "62 99876-4356");
 * $teste -> __set("email", "marcia@yahoo.com");
 * $teste -> __set("logradouro", "Rua Ceres");
 * $teste -> __set("bairro", "Centro");
 * $teste -> __set("cidade", "Ceres");
 * $teste -> __set("estado", "GO");
 * $teste -> __set("cep", "76.365-000");
 * $teste -> __set("perfil", "Administrador");
 * $teste -> __set("senha", "123456");
 *
 * echo "<pre>";
 * print_r($teste);
 * echo "</pre>";
 *
 * echo $teste -> __get('nome'). $teste -> __get('cpf').
 * $teste -> __get('rg'). $teste -> __get('sexo').
 * $teste -> __get('dataNascimento'). $teste -> __get('tel').
 * $teste -> __get('email'). $teste -> __get('logradouro').
 * $teste -> __get('bairro'). $teste -> __get('cidade').
 * $teste -> __get('estado'). $teste -> __get('cep').
 * $teste -> __get('perfil'). $teste -> __get('senha');
 */

?>
