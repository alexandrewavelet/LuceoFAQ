<?php

	require_once 'databaseConnection.php';

	/**
	* Class QuestionsDA : Data Adapter for the Question class
	*/
	class QuestionsDA
	{
		private static $_db;

		public static function init(){
			self::$_db = new DatabaseConnection();
		}

		/**
		 * TEST FUNCTION ; TODO : implement loadQuestion, get a question from the database based on its id, then update this doc
		 * @param  int $idQuestion 		Id of the question to retrieve
		 * @param  bool $retrunsArray 	True if we want an array as return (AJAX purpose) instead of object
		 * @return Question        		Question object
		 */
		public static function loadQuestion($idQuestion = 0, $returnsArray = false){
			if ($returnsArray) {
				return array('success' => true, 'id' => $idQuestion);
			}else{
				return true;
			}
		}

		/**
		 * Adds a new question to DB
		 * @param  Question 	$question     Question to add
		 * @param  boolean  	$returnsArray True if we want an array as return (AJAX purpose) instead of a boolean
		 * @return mixed 		$response     Array with message or true/false
		 */
		public static function insertQuestion(Question $question, $returnsArray)
		{
			self::$_db->prepareInsertStatement('questions', $question->serialize());
			// For the purpose of debug, use :
			// echo self::$_db->getStatement()->debugDumpParams();
			$executed = self::$_db->executeStatement();
			if ($executed) {
				$response = ($returnsArray) ? array('id' => self::$_db->getInsertId(), 'message' => 'The question was added successfully.') : true ;
			} else {
				$response = ($returnsArray) ? array('error' => true, 'message' => self::$_db->getErrorMessage()) : false ;
			}

			// Use DatabaseConnection to create insert statement, then executes, verify and return what's asked
			return $response;
		}

		/**
		 * Update a question in DB
		 * @param  Question 	$question     Question update
		 * @param  boolean  	$returnsArray True if we want an array as return (AJAX purpose) instead of a boolean
		 * @return mixed 		$response     Array with message or true/false
		 */
		public static function updateQuestion(Question $question, $returnsArray)
		{
			// Use DatabaseConnection to create update statement, then executes, verify and return what's asked
			return $response;
		}

	}

	QuestionsDA::init();