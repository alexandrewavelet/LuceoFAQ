<?php

	class DatabaseConnection{

		protected $connection;

		function __construct(){
			$dsn = "mysql:host=localhost;dbname=luceofaq";
			$user = "root";
			$pass = "";
			try {
				$this->connection = new PDO($dsn, $user, $pass);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		function getConnection(){
			return $this->connection;
		}
	}