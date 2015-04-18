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
		protected $statement;

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
		* Gets the value of statement.
		*
		* @return mixed
		*/
		public function getStatement()
		{
			return $this->statement;
		}

		/**
		* Sets the value of statement.
		*
		* @param mixed $statement the statement (either PDOStatement or string)
		*
		* @return self
		*/
		public function setStatement($statement)
		{
			$this->statement = (is_object($statement)) ? $statement : $this->connection->prepare($statement) ;
			$this->statement = $statement;

			return $this;
		}

	// DOC TO BE MADE, PRECISIONS HAVE TO BE DONE HERE
	// Idea : 	$params depends on the CRUD operation to perform
	// 			$template is used to return tagged question for easier editing; Something like "SELECT #tagSelect FROM #tagTable Where #tagWhere" -> functions where(), select(), ... SqlStatement class?

		/**
		 * Construct an Insert statement in a PDOStatement object, then fill it with parameters
		 * @param  string $table  name of the table where insert the data
		 * @param  array  $values values to insert and name of the columns
		 */
		public function prepareInsertStatement($table, $values)
		{
			// We create an array with unnamed placeholder to bind the params
			$numberOfValues = count($values);
			$placeholders = implode(',', array_fill(0, $numberOfValues, '?'));
			$this->statement = $this->connection->prepare('INSERT INTO '.$table.' ('.implode(',', array_keys($values)).') VALUES ('.$placeholders.')');
			$insertValues = array_values($values);
			foreach ($insertValues as $paramNum => &$value) {
				$this->statement->bindParam($paramNum + 1, $value);
			}
		}

		public function prepareUpdateStatement($table, $values, $conditions)
		{
			# code...
		}

		public function prepareDeleteStatement($table, $conditions)
		{
			# code...
		}

		public function prepareSelectStatement($params, $template)
		{
			# code...
		}

		/**
		 * Executes the statement
		 * @return bool true if success, false if fail
		 */
		public function executeStatement()
		{
			return $this->statement->execute();
		}

		/**
		 * Returns the last inserted Id in the DB
		 * @return int id
		 */
		public function getInsertId()
		{
			return $this->connection->lastInsertId();
		}

		/**
		 * Returns the complete error message of the last executed statement
		 * During development, we can let it like this, after it'll be better to send back an array with a message and display the error details in the js console.
		 * @return string error message
		 */
		public function getErrorMessage()
		{
			$error = $this->statement->errorInfo();
			$errorText 	= '<h6>Something happened ... :(</h6>';
			$errorText .= 'Error code : '.$error[0].'<br>';
			$errorText .= 'Driver error code : '.$error[1].'<br>';
			$errorText .= 'Error Message : '.$error[2].'<br>';
			return $errorText;
		}
}