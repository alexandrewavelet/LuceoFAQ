<?php

	class DatabaseConnection{

		/**
		 * DB ressource
		 * @var PDO
		 */
		protected $connection;

		/**
		 * SQL query to perform
		 * @var string
		 */
		protected $sql;

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

		/**
		* Gets the value of sql.
		*
		* @return mixed
		*/
		public function getSql()
		{
			return $this->sql;
		}

		/**
		* Sets the value of sql.
		*
		* @param mixed $sql the sql
		*
		* @return self
		*/
		public function setSql($sql)
		{
			$this->sql = $sql;

			return $this;
		}

	// DOC TO BE MADE, PRECISIONS HAVE TO BE DONE HERE
	// Idea : 	$params depends on the CRUD operation to perform
	// 			$template is used to return tagged question for easier editing; Something like "SELECT #tagSelect FROM #tagTable Where #tagWhere" -> functions where(), select(), ... SqlStatement class?
		public function createInsertStatement($params, $template)
		{
			# code...
		}

		public function createUpdateStatement($params, $template)
		{
			# code...
		}

		public function createDeleteStatement($params, $template)
		{
			# code...
		}

		public function createSelectStatement($params, $template)
		{
			# code...
		}
}