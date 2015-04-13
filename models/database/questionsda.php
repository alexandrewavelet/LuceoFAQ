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
		 * @param  bool $retrunsArray 	True if we want a array as return (AJAX purpose) instead of object
		 * @return Question        		Question object
		 */
		public static function getQuestion($idQuestion = 0, $returnsArray = false){
			if ($returnsArray) {
				return array('success' => true, 'id' => $idQuestion);
			}else{
				return true;
			}
		}

	}

	QuestionsDA::init();