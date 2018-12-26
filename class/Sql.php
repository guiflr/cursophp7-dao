<?php

class Sql extends PDO{

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=db_php7","root","");

	}

	private function setParams($statement,$parameters = array()){
		foreach ($parameters as $key => $value) {

			/*passou a statement que contem a query pronta, os campos do banco(key)
			e os valores a serem buscados(value)*/
			$this->setParam($statement,$key,$value);
		}

	}

	private function setParam($statement,$key,$value){

		/*contem query(statement), os campos do banco e os 
		valores da clausula como parametro de busca*/
		$statement->bindParam($key,$value);
	}

	public function query($rawQuery,$params = array()){

		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt,$params);
		$stmt->execute();

		//passou para o setParams
		return $stmt;
	}

	public function select($rawQuery,$params = array()):array{

		$stmt = $this->query($rawQuery,$params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>