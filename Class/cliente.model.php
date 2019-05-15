<<?php
  class Cliente extends Pessoa {
    private $dataUltimaCompra;

    public function __get($atributo) {
      return $this->$atributo;
        }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
        }

    // metodo...

    function listarPorUltimaCompra() {
      return $this - > __get() ;
    }


}
?>
