<?php
/**
 * A class to handle databases of type MSSQL, MySQL and SQLite.
 * @author Daniel Spandel
 * 
*/
class MP_Database {
	private $db;

	public function __construct($type, $host, $dbname=null, $username=null, $password=null) {
		$this->db = null;
		try {
			if ($type == 'sqlite') {
				$this->db = new PDO('sqlite:'.$host);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, 
				                       PDO::ERRMODE_EXCEPTION);
			} else if ($type == 'mssql' || $type == 'mysql') {
				$this->db = new PDO($type.":host=".$host.";dbname=".$dbname, $username, $password);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, 
				                       PDO::ERRMODE_EXCEPTION);
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	public function closeConnection () {
		$this->db = null;
	}
	public function createTable ($tableName, $valueArr) {
		try{
			$create_str = "CREATE TABLE IF NOT EXISTS ".$tableName." (";
			foreach ($valueArr as $name => $type) {
				$create_str .= $name." ".$type.", ";
			}
			$create_str = substr_replace($create_str ,"",-2);
			$create_str .=")";
		    $this->db->exec($create_str);
		}
		catch (PDOException $e) {
			// Print PDOException message
			echo $e->getMessage();
		}
		
	}
	public function insertValues ($tableName, $valueArr) {
		try{
			$insert_str = "INSERT INTO ".$tableName." (";
			$values="VALUES (";
			$singleObject=$valueArr;
			if(is_array(reset($valueArr)))	
				$singleObject=reset($valueArr);

			foreach ($singleObject as $key => $value) {
				$insert_str .= $key.", ";
				$values .= ":".$key.", ";
			}
			$values = substr_replace($values ,"",-2);
			$insert_str = substr_replace($insert_str ,"",-2);
			$insert_str .= ") ".$values.")";

			$stmt = $this->db->prepare($insert_str);

			foreach ($valueArr as $key => $value) {
				if(is_array($value)) {
					foreach ($value as $vkey => $vvalue) {
						$stmt->bindValue(':'.$vkey, $vvalue);
					}
					$stmt->execute();	      			
				}
				else {
					$stmt->bindValue(':'.$key, $value);
		      		$stmt->execute();
				}
			}
		}
		catch (PDOException $e) {
			// Print PDOException message
			echo $e->getMessage();
		}
	}
	public function queryFromTable($query) {		
		$result=array();
		try {	
			$result = $this->db->query($query);
		}
		catch (PDOException $e) {
			// Print PDOException message
			echo $e->getMessage();
		}
		return $result;
	}
	public function dropTable($tableName) {		
		try {
			$this->db->exec("DROP TABLE ".$tableName);
		}
		catch (PDOException $e) {
			// Print PDOException message
			echo $e->getMessage();
		}	
	}
}