<?php

class Marcas{

	private $id_master;
    private $id_oper;
    private $cd_marca;
    private $ds_marca;
    private $ds_obs_marca;
    private $dt_cad_marca;
    private $dt_alt_marca;
    private $es_inat_marca;

    public function getIdMaster(){
    	return $this->id_master;
    }
    public function setIdMaster($value){
    	$this->id_master = $value;
    }

    public function getIdOper(){
    	return $this->id_oper;
    }
    public function setIdOper($value){
    	$this->id_oper = $value;
    }

    public function getIdMarca(){
    	return $this->id_marca;
    }
    public function setIdMarca($value){
    	$this->id_marca = $value;
    }

    public function getCdMarca(){
    	return $this->cd_marca;
    }
    public function setCdMarca($value){
    	$this->cd_marca = $value;
    }

    public function getDsMarca(){
    	return $this->ds_marca;
    }
    public function setDsMarca($value){
    	$this->ds_marca = $value;
    }

    public function getDsObsMarca(){
    	return $this->ds_obs_marca;
    }
    public function setDsObsMarca($value){
    	$this->ds_obs_marca = $value;
    }

    public function getDtCadMarca(){
    	return $this->dt_cad_marca;
    }
    public function setDtCadMarca($value){
    	$this->dt_cad_marca = $value;
    }

    public function getDtAltMarca(){
    	return $this->dt_alt_marca;
    }
    public function setDtAltMarca($value){
    	$this->dt_alt_marca = $value;
    }

    public function getEsInatMarca(){
    	return $this->es_inat_marca;
    }
    public function setEsInatMarca($value){
    	$this->es_inat_marca = $value;
    }

    public function buscaId($id){

    	$sql = new Sql();

    	$results = $sql->select("SELECT * FROM tb_marcas WHERE id_marca = :ID_MARCA", array(
    	":ID_MARCA"=>$id
		));
    
    	if(count($results) > 0){

    		$row = $results[0];

    		$this->setIdMaster($row['id_master']);
    		$this->setIdOper($row['id_oper']);
    		$this->setIdMarca($row['id_marca']);
    		$this->setCdMarca($row['cd_marca']);
    		$this->setDsMarca($row['ds_marca']);
    		$this->setDsObsMarca($row['ds_obs_marca']);
    		$this->setDtCadMarca(new DateTime($row['dt_cad_marca']));
    		$this->setDtAltMarca(new DateTime($row['dt_alt_marca']));
    		//$this->setDtCadMarca($row['dt_cad_marca']);
    		//$this->setDtAltMarca($row['dt_alt_marca']);
    		$this->setEsInatMarca($row['es_inat_marca']);

    	}

    }

    public function __toString(){

    	return json_encode(array(
    		"id_master"=>$this->getIdMaster(),
    		"id_oper"=>$this->getIdOper(),
    		"id_marca"=>$this->getIdMarca(),
    		"cd_marca"=>$this->getCdMarca(),
    		"ds_marca"=>$this->getDsMarca(),
    		"ds_obs_marca"=>$this->getDsObsMarca(),
    		"dt_cad_marca"=>$this->getDtCadMarca()->format("d/m/Y H:i:s"),
    		"dt_alt_marca"=>$this->getDtAltMarca()->format("d/m/Y H:i:s"),
    		//"dt_cad_marca"=>$this->getDtCadMarca(),
    		//"dt_alt_marca"=>$this->getDtAltMarca(),
    		"es_inat_marca"=>$this->getEsInatMarca()
    	));

    }

}
