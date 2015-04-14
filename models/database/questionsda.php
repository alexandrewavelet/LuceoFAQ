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
		 * TEST FUNCTION ; TODO : implement getQuestion, get a question from the database based on its id, then update this doc
		 * @param  int $idQuestion 		Id of the question to retrieve
		 * @param  bool $retrunsArray 	True if we want an array as return (AJAX purpose) instead of object
		 * @return Question        		Question object
		 */
		public static function getQuestion($idQuestion = 0, $returnsArray = false){
			if ($returnsArray) {
				return array('success' => true, 'id' => $idQuestion);
			}else{
				return true;
			}
		}

		/**
		 * Save a question in DB : construct the object and executes the insert or update method
		 * @param  int  	$id           id of the question
		 * @param  string  	$label        label of the question
		 * @param  string  	$answer       answer of the question
		 * @param  boolean 	$returnsArray True if we want an array as return (AJAX purpose) instead of a boolean
		 * @return mixed   	$response     Array with message or true/false
		 */
		public static function saveQuestion($id, $label, $answer, $returnsArray = false)
		{
			$question = new Question($id, $label, $answer);
			if ($question->getId() == 0) {
				$response = self::insertQuestion($question, $returnsArray);
			} else {
				$response = self::updateQuestion($question, $returnsArray);
			}

			return $response;
		}

		/**
		 * Adds a new question to DB
		 * @param  Question 	$question     Question to add
		 * @param  boolean  	$returnsArray True if we want an array as return (AJAX purpose) instead of a boolean
		 * @return mixed 		$response     Array with message or true/false
		 */
		public static function insertQuestion(Question $question, $returnsArray)
		{
			// Use DatabaseConnection to create insert statement, then executes, verify and return what's asked
			return array('error' => true, 'message' => 'It worked ! (stupidest error message ever) <br> Here\'s your data : <br>id = '.$question->getId().', <br>question : '.$question->getLabel().', <br>answer : '.$question->getAnswer());
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