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

}

?>
