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

		/**
		 * Links tags to a question : delete the existing links, then add the new ones
		 * @param  Question $question 	The question containing the tags
		 * @return mixed             	True if everything is okay, array with error message if not
		 */
		public static function saveQuestionTags(Question $question)
		{
			$deleteExecuted = self::deleteLiensQuestionTags($question);
			$insertExecuted = true;
			$insertFails = array();

			foreach ($question->getTags() as $tag) {
				if ($tag->getId() == 0) {
					$tagCreated = TagsDA::insertTag($tag); // returns the id of the tag if success
					if ($tagCreated) {
						$tag->setId($tagCreated);
					}else{
						return array('error' => true, 'message' => self::$_db->getErrorMessage());
					}
				}
				$insertValues = array('pkQuestion' => $question->getId(), 'pkTag' => $tag->getId());
				self::$_db->prepareInsertStatement('questions_tags', $insertValues);
				if (!self::$_db->executeStatement()) {
					$insertExecuted = false;
					array_push($insertFails, $tag);
				}
			}

			if (!$deleteExecuted || !$insertExecuted) {
				$response = QuestionActions::buildErrorMessageTagSave($deleteExecuted, $insertExecuted, $insertFails);
			}else{
				$response = true;
			}

			return $response;
		}

		/**
		 * Delete all the links question-tags for a question
		 * @param  Question $question 	The question
		 * @return boolean           	True if success, else false
		 */
		public static function deleteLiensQuestionTags(Question $question)
		{
			self::$_db->prepareDeleteStatement('questions_tags', array('pkQuestion' => $question->getId()));
			return self::$_db->executeStatement();
		}

		public static function getQuestionList()
		{
			return self::$_db->execSQL('SELECT q.pkQuestion AS id, q.question_en AS question, q.answer_en AS answer, q.wiki_url AS wikiURL FROM questions q ORDER BY id DESC', 'Question');
		}

	}

	QuestionsDA::init();