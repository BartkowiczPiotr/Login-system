<?php

class Connection {
	
	public function dbConnect(){
		
		try{
			
			return new PDO("mysql:host=localhost; dbname=login; charset=utf8", "root", "", 
			array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			
		} catch (PDOException $database_error){
			echo $database_error->getMessage();
			exit();
		}
		
	}
	
};

 