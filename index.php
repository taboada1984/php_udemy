<?php

require_once("config.php");

$sql = new Sql();

$marcas = $sql->select("SELECT * FROM tb_marcas");

echo json_encode($marcas);

?>
