<?php

require_once("config.php");

//Forma simplificada de utilizar a classe Sql
//$sql = new Sql();
//$marcas = $sql->select("SELECT * FROM tb_marcas");
//echo json_encode($marcas);

//Utilizando a classe Marcas para chamar um registro
/*$busca_marca = new Marcas();
$marca = "62";
$busca_marca->buscaId($marca);
echo $busca_marca;*/

//Utilizando a classe Marcas para chamar todos os registros
//$marcas = Marcas::listarMarcas();
//echo json_encode($marcas);

//Utilizando a classe Marcas para fazer uma busca por descrição
/*$busca = "tes";
$marcas = Marcas::buscaDesc($busca);
echo json_encode($marcas);*/

//Utilizando a classe Marcas para fazer uma busca por IDs como um login e senha
/*$busca = new Marcas();
$id_master = "0001";
$id_marca = "000063";
$busca->buscaIDmarcaEmaster($id_marca, $id_master);
echo $busca;*/

//Utilizando a classe Marcas para inserir dados no banco com o comando procedure(POR? O PHPMYADMIN N? EST? APTO A PROCEDURES (25/09/2020))
/*$marca = new Marcas();
$marca->setIdMaster("0050");
$marca->setIdOper("005050");
$marca->setIdMarca("005151");
$marca->setCdMarca("005252");
$marca->setDsMarca("Teste Dezena 50");
$marca->setDsObsMarca("Deu certo 50 vezes");
$marca->setDtCadMarca("2018-06-05 22:58:03");
$marca->setDtAltMarca("2018-06-05 22:58:03");
$marca->setEsInatMarca("A");
$marca->inserirMarcaProcedure();
echo $marca;*/

//Utilizando a classe Marcas para inserir dados no banco

/*$marcas = new Marcas();
$marcas->inserirMarca('0091','009091','000003','009191','Teste Inserir 91','Deu certo 91 vezes','I','2020-09-25 22:58:03','2020-09-25 22:58:03');
echo $marcas;*/

//Utilizando a classe Marcas para atualizar dados do Banco
/*$marcas = new Marcas();
$id_marca = "000054";
$marcas->buscaId($id_marca);
$marcas->update('0050','005050','005252','Teste Update','Deu certo 70 vezes','I','2018-06-12 22:58:03','2018-06-12 22:58:03');
echo $marcas;*/

//Utilizando a classe Marcas para deletar dados do banco
$marcas = new Marcas();
$id_marca = "000057";
$marcas->buscaId($id_marca);
$marcas->delete();
echo $marcas;
?>
