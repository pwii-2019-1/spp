<<?php
  class Colaborador extends Pessoa {
    private $perfil;
    private $senha;


    public function __get($atributo) {
      return $this->$atributo;
        }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
        }

    // metodos...

    function listarPorPerfil() {
      return $this - > __get() ;
    }

  }

?>
