<?php
		require_once('../classes/question.php');
	
	/**
	* Class which executes common actions for Question class
	*/
	class QuestionActions
	{
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
				$response = QuestionsDA::insertQuestion($question, $returnsArray);
				// Stuff with tags have to be done later (either her, or outside the if statement if it's the same for both)
			} else {
				$response = QuestionsDA::updateQuestion($question, $returnsArray);
				// Stuff with tags have to be done later (either her, or outside the if statement if it's the same for both)
			}

			return $response;
		}

		public static function repeaterQuestion($id,$label,$answer, $returnsArray = false)

		{
			$question = new Question($id, $label, $answer);
			if ($question->getQuestion == false) {
				echo 'il y a rien';
			}else{
				foreach ($question as $key => $value) {
					$tableauQuestion = $question->getQuestion();
					$tableauQuestion++;
						
				}
			}

			var_dump($tableauQuestion);

		}
		
	}

	$test = new QuestionActions;
	$test-> repeaterQuestion($id,$label,$answer);
	var_dump($test);