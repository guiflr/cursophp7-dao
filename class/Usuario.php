<?php

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){

		return $this->idusuario;	
	}

	public function getDeslogin(){

		return $this->deslogin;	
	}

	public function getDessenha(){

		return $this->dessenha;	
	}

	public function getDtcadastro(){

		return $this->dtcadastro;	
	}

	public function setIdusuario($value){

		$this->idusuario = $value;
	}

	public function setDeslogin($value){

		$this->deslogin = $value;
	}

	public function setDessenha($value){

		$this->dessenha = $value;
	}

	public function setDtcadastro($value){

		$this->dtcadastro = $value;
	}


	public function loadById($id){

		$sql = new Sql();

		$res = $sql->select("SELECT * FROM tb_usuario WHERE idusuario=:ID",array(

			":ID"=>$id

		));

		if(count($res)>0){
			
			$row = $res[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuario ORDER BY deslogin");
	}

	public static function search($buscar){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuario WHERE deslogin LIKE :SEARCH",array(

			":SEARCH"=>"%".$buscar."%"
		));
	}

	public function login($login,$pass){

		$sql = new Sql();

		$res = $sql->select("SELECT * FROM tb_usuario WHERE deslogin=:LOGIN AND dessenha=:PASS",array(

			":LOGIN"=>$login,
			":PASS"=>$pass
		));

		if(count($res)>0){
			$row = $res[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}else{
			throw new Exception("Erro na senha ou login");
			
		}
	}


	public function __toString(){

		return json_encode(array(

			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));
	}
}


?>