<?php

require_once("config.php");

//Forma simplificada de utilizar a classe Sql
//$sql = new Sql();
//$marcas = $sql->select("SELECT * FROM tb_marcas");
//echo json_encode($marcas);

//Utilizando a classe Marcas
$busca_marca = new Marcas();

$marca = "62";

$busca_marca->buscaId($marca);

echo $busca_marca;

?>
