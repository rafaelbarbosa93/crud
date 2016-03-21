<?php 

namespace data;

use app\interfaces\Imodel;
use data\Connection;
use data\AttributesCreate;

use PDOException;

class Model implements Imodel{

	private $database;

	public function __construct(){

		$database = new Connection();
		$this->database = $database->connection();

	}


	public function create($attributes){
		
		$attributesCreate = new AttributesCreate;

		$fields = $attributesCreate->createFields($attributes);
		$values = $attributesCreate->createValues($attributes);

		$query = "insert into $this->table ($fields) values ($values);";
		$pdo = $this->database->prepare($query);
		print_r($fields);
		print_r($query);
		$bindParameters = $attributesCreate->bindCreateParameters($attributes);
		print_r($bindParameters);
		die;
		try {
			$pdo->execute($bindParameters);

			return $this->database->lastInsertId();
		} catch (PDOException $e) {
			echo($e->getMessage());
		}
	}


	public function read(){
		$query = "select * from ".$this->table;
		$pdo = $this->database->prepare($query);

		try {
			$pdo->execute();
			return$pdo->fetchAll();
			//print_r($pdo->fetchAll());
		} catch (PDOException $e) {
			echo($e->getMessage());
		}
	}


	public function update($id, $attributes){
		$attributesUpdate = new AttributesUpdate;

		$fields = $attributesUpdate->updateFields($attributes);

		$query = "update $this->table set $fields where id = :id";

		$pdo = $this->database->prepare($query);

		$bindUpdateParameters = $attributesUpdate->bindUpdateParameters($attributes);

		$bindUpdateParameters['id'] = $id;

		try {
			
			$pdo->execute($bindUpdateParameters);
			header("location: /crud");

		} catch (PDOException $e) {

			echo $e->getMessage();
		}
	}


	public function delete($field, $value){
		$query = "delete from $this->table where $field = :field;";

		$pdo = $this->database->prepare($query);

		try {
			$pdo->bindParam("field", $value);
			$pdo->execute();

			return $pdo->rowCount();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function findBy($field, $value){
		$query = "select * from $this->table where $field = :value";

		$pdo = $this->database->prepare($query);

		try {
			
			$pdo->bindParam(":value",$value);
			$pdo->execute();

			return $pdo->fetch();


		} catch (PDOException $e) {
			dump($e->getMessage());
		}
	}
}