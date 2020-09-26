<?php

date_default_timezone_set("America/Sao_Paulo");

class Marcas{
    //ATRIBUTOS
    private $id_marca;
	private $id_master;
    private $id_oper;
    private $cd_marca;
    private $ds_marca;
    private $ds_obs_marca;
    private $dt_cad_marca;
    private $dt_alt_marca;
    private $es_inat_marca;
    //MÉTODOS GET E SET
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
    //MÉTODO DE BUSCAR ID
    public function buscaId($id_marca){

    	$sql = new Sql();

    	$results = $sql->select("SELECT * FROM tb_marcas WHERE id_marca = :ID_MARCA", array(
    	":ID_MARCA"=>$id_marca
		));
    
    	if(count($results) > 0){

            $this->setData($results[0]);        

        }

    }
    //MÉTODO DE LISTAR CADASTROS
    public static function listarMarcas(){

    	$sql = new Sql();
    	return $sql->select("SELECT * FROM tb_marcas order by ds_marca");

    }
    //MÉTODO DE BUSCAR POR DESCRIÇÃO
    public static function buscaDesc($desc){

    	$sql = new Sql();
    	return $sql->select("SELECT * FROM tb_marcas WHERE ds_marca LIKE :busca ORDER BY ds_marca", array(
    		":busca"=>"%" . $desc . "%"
    	));

    }
    //MÉTODO DE BUSCAR ATRAVÉS DE UM ID E SENHA
    public function buscaIDmarcaEmaster($id_marca,$id_master){

		$sql = new Sql();

    	$results = $sql->select("SELECT * FROM tb_marcas WHERE id_marca = :ID_MARCA AND id_master = :ID_MASTER", array(
    	":ID_MARCA"=>$id_marca,
    	":ID_MASTER"=>$id_master
		));
    
    	if(count($results) > 0){

            $this->setData($results[0]);    	

    	}else{

    		throw new Exception("Algum ID está errado");

    	}
     }
    //MÉTODO PARA UTILIZAR O SET DO BANCO DE DADOS
    public function setData($data){

        $this->setIdMaster($data["id_master"]);
        $this->setIdOper($data["id_oper"]);
        $this->setIdMarca($data["id_marca"]);
        $this->setCdMarca($data["cd_marca"]);
        $this->setDsMarca($data["ds_marca"]);
        $this->setDsObsMarca($data["ds_obs_marca"]);
        $this->setEsInatMarca($data["es_inat_marca"]);
        $this->setDtCadMarca(new DateTime($data["dt_cad_marca"]));
        $this->setDtAltMarca(new DateTime($data["dt_alt_marca"]));
        //$this->setDtCadMarca($data["dt_cad_marca"]);
        //$this->setDtAltMarca($data["dt_alt_marca"]);

    }
    //ABAIXO É O FORMATO DE INSERIR NO BANCO ATRAVÉS DE PROCEDURE, PORÉM O PHPMYADMIN NÃO ESTÁ APTO A PROCEDURES (25/09/2020)
    /*public function inserirMarcaProcedure(){
           $sql = new Sql();
           $results = $sql->select("CALL sp_marcas_insert(:ID_MASTER, :ID_OPER, :ID_MARCA, :CD_MARCA, :DS_MARCA, :DS_OBS_MARCA, :DT_CAD_MARCA, :DT_ALT_MARCA,:ES_INAT_MARCA)", array(
           ":ID_MASTER"=>$this->getIdMaster(),
    		":ID_OPER"=>$this->getIdOper(),
    		":ID_MARCA"=>$this->getIdMarca(),
    		":CD_MARCA"=>$this->getCdMarca(),
    		":DS_MARCA"=>$this->getDsMarca(),
    		":DS_OBS_MARCA"=>$this->getDsObsMarca(),
    		":ES_INAT_MARCA"=>$this->getEsInatMarca(),
    		":DT_CAD_MARCA"=>$this->getDtCadMarca(),
    		":DT_ALT_MARCA"=>$this->getDtAltMarca()
           ));
           if(count($results) > 0){
            $this->setData($results[0]);        
            }
    }*/
    
    //MÉTODO PARA INSERIR DADOS NO BANCO
    
    public function inserirMarca($id_master, $id_oper,$id_marca, $cd_marca, $ds_marca, $ds_obs_marca, $es_inat_marca, $dt_cad_marca, $dt_alt_marca){

        $this->setIdMaster($id_master);
        $this->setIdOper($id_oper);
        $this->setIdMarca($id_marca);
        $this->setCdMarca($cd_marca);
        $this->setDsMarca($ds_marca);
        $this->setDsObsMarca($ds_obs_marca);
        $this->setEsInatMarca($es_inat_marca);
        //$this->setDtCadMarca(new DateTime($dt_cad_marca));
        //$this->setDtAltMarca(new DateTime($dt_alt_marca));
        $this->setDtCadMarca($dt_cad_marca);
        $this->setDtAltMarca($dt_alt_marca);

        $sql = new Sql();

        $sql->query("INSERT INTO tb_marcas (id_master, id_oper, id_marca, cd_marca, ds_marca, ds_obs_marca, es_inat_marca, dt_cad_marca, dt_alt_marca)
                            VALUES (:ID_MASTER, :ID_OPER, :ID_MARCA, :CD_MARCA, :DS_MARCA, :DS_OBS_MARCA, :ES_INAT_MARCA, :DT_CAD_MARCA, :DT_ALT_MARCA)", array(
            ":ID_MASTER"=>$this->getIdMaster(),
            ":ID_OPER"=>$this->getIdOper(),
            ":ID_MARCA"=>$this->getIdMarca(),
            ":CD_MARCA"=>$this->getCdMarca(),
            ":DS_MARCA"=>$this->getDsMarca(),
            ":DS_OBS_MARCA"=>$this->getDsObsMarca(),
            ":ES_INAT_MARCA"=>$this->getEsInatMarca(),
            ":DT_CAD_MARCA"=>$this->getDtCadMarca(),
            ":DT_ALT_MARCA"=>$this->getDtAltMarca()
            ));
    }
    
    //MÉTODO PARA ATUALIZAR/EDITAR DADOS DO BANCO

    public function update($id_master, $id_oper, $cd_marca, $ds_marca, $ds_obs_marca, $es_inat_marca, $dt_cad_marca, $dt_alt_marca){

        $this->setIdMaster($id_master);
        $this->setIdOper($id_oper);
        $this->setCdMarca($cd_marca);
        $this->setDsMarca($ds_marca);
        $this->setDsObsMarca($ds_obs_marca);
        $this->setEsInatMarca($es_inat_marca);
        //$this->setDtCadMarca(new DateTime($dt_cad_marca));
        //$this->setDtAltMarca(new DateTime($dt_alt_marca));
        $this->setDtCadMarca($dt_cad_marca);
        $this->setDtAltMarca($dt_alt_marca);

        $sql = new Sql();

        $sql->query("UPDATE tb_marcas SET id_master = :ID_MASTER, id_oper = :ID_OPER, cd_marca = :CD_MARCA, ds_marca = :DS_MARCA,
        ds_obs_marca = :DS_OBS_MARCA, es_inat_marca = :ES_INAT_MARCA, dt_cad_marca = :DT_CAD_MARCA, dt_alt_marca = :DT_ALT_MARCA WHERE id_marca = :ID_MARCA", array(
            ":ID_MASTER"=>$this->getIdMaster(),
            ":ID_OPER"=>$this->getIdOper(),
            ":CD_MARCA"=>$this->getCdMarca(),
            ":DS_MARCA"=>$this->getDsMarca(),
            ":DS_OBS_MARCA"=>$this->getDsObsMarca(),
            ":ES_INAT_MARCA"=>$this->getEsInatMarca(),
            ":DT_CAD_MARCA"=>$this->getDtCadMarca(),
            ":DT_ALT_MARCA"=>$this->getDtAltMarca(),
            ":ID_MARCA"=>$this->getIdMarca()
            ));
    }

    //MÉTODO PARA DELETAR DADOS DO BANCO
    public function delete(){

        $sql = new Sql();
        $sql->query("DELETE FROM tb_marcas WHERE id_marca = :ID_MARCA", array(
            ":ID_MARCA"=>$this->getIdMarca()
             ));
        $this->setIdMaster("");
        $this->setIdOper("");
        $this->setIdMarca("");
        $this->setCdMarca("");
        $this->setDsMarca("");
        $this->setDsObsMarca("");
        $this->setEsInatMarca("");
        $this->setDtCadMarca(new DateTime());
        $this->setDtAltMarca(new DateTime());                
    }

    //MÉTODO CONSTRUTOR PARA QUE OS DADOS SEJAM PASSADOS DENTRO DA FUNÇÃO CHAMADA
    public function __construct($id_master = "", $id_oper = "", $id_marca = "", $cd_marca = "", $ds_marca = "", $ds_obs_marca = "",
    $es_inat_marca = "", $dt_cad_mara = "",$dt_alt_marca = ""){

        $this->setIdMaster($id_master);
        $this->setIdOper($id_oper);
        $this->setIdMarca($id_marca);
        $this->setCdMarca($cd_marca);
        $this->setDsMarca($ds_marca);
        $this->setDsObsMarca($ds_obs_marca);
        $this->setEsInatMarca($es_inat_marca);
        $this->setDtCadMarca($dt_cad_marca);
        $this->setDtAltMarca($dt_alt_marca);
        //$this->setDtCadMarca(new DateTime($dt_cad_marca));
        //$this->setDtAltMarca(new DateTime($dt_alt_marca));

    }
    //MÉTODO PARA TRANSFORMAR AS INFORMAÇÕES EM JSON_ENCODE FACILITANDO A MANIPULAÇÃO E A VISUALIZAÇÃO NO SITE
    public function __toString(){

    	return json_encode(array(
    		"id_master"=>$this->getIdMaster(),
    		"id_oper"=>$this->getIdOper(),
    		"id_marca"=>$this->getIdMarca(),
    		"cd_marca"=>$this->getCdMarca(),
    		"ds_marca"=>$this->getDsMarca(),
    		"ds_obs_marca"=>$this->getDsObsMarca(),
    		"es_inat_marca"=>$this->getEsInatMarca(),
    		//"dt_cad_marca"=>$this->getDtCadMarca()->format("d/m/Y H:i:s"),
    		"dt_cad_marca"=>$this->getDtCadMarca(),
    		//"dt_alt_marca"=>$this->getDtAltMarca()->format("d/m/Y H:i:s")
    		"dt_alt_marca"=>$this->getDtAltMarca()
    	));

    }

}
