<?php

	/**
	* Class which executes common actions for Question class
	*/
	class QuestionActions
	{

		/**
		 * Save a question in DB : construct the object and executes the insert or update method
		 * @param  int  	$id           Id of the question
		 * @param  string  	$label        Label of the question
		 * @param  string  	$answer       Answer of the question
		 * @param  boolean 	$returnsArray True if we want an array as return (AJAX purpose) instead of a boolean
		 * @return mixed   	$response     Array with message or true/false
		 */
		public static function saveQuestion($id, $label, $answer, $tagsArray, $returnsArray = true)
		{
			$question = new Question($id, $label, $answer);
			if ($question->getId() == 0) {
				$response = QuestionsDA::insertQuestion($question, $returnsArray);
				if (isset($response['id'])) {
					$question->setId($response['id']);
				}else{
					return $response;
				}
			} else {
				$response = QuestionsDA::updateQuestion($question, $returnsArray);
			}


			$question->setTags(TagActions::getObjectsTagFromArray($tagsArray));
			$responseTags = QuestionsDA::saveQuestionTags($question);
			if (isset($responseTags['error'])) {
				$response['message'] = $response['message'].$responseTags['message'];
			}

			return $response;
		}

		/**
		 * Builds an "informative" error message to display if there is some fails when trying to add tags to a question
		 * @param  boolean 	$deleteExecuted False if there is a fail when deleting the existing tags
		 * @param  boolean 	$insertExecuted False if there is a fail when adding tags to a question
		 * @param  array 	$insertFails    List of the tags non added to the question
		 * @return array                 	Array containing the error message
		 */
		public static function buildErrorMessageTagSave($deleteExecuted, $insertExecuted, $insertFails)
		{
			$message  = '<h6>Notice</h6>';
			$message .= '<ul>';
			if (!$deleteExecuted) {
				$message .= '<li>The tags weren\'t properly removed from the question.</li>';
			}
			if (!$insertExecuted) {
				$tagNames =array();
				foreach ($insertFails as $tag) {
					array_push($tagNames, $tag->getLabel());
				}
				$message .= '<li>the following tags weren\'t added to the question : '.implode(', ', $tagNames).'.</li>';
			}
			$message .= '</ul>';

			return array('error' => 1, 'message' => $message);
		}

		public static function getQuestionList($term = false)
		{
			$questions = QuestionsDA::getQuestionList($term);
			foreach ($questions as &$question) {
				$question->setTags(TagActions::getTagsQuestion($question->getId()));
			}

			return $questions;
		}

	}