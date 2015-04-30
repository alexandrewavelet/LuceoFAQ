<?php

	/**
	* Class Question
	*/
	class Question
	{

		/**
		 * id
		 *
		 * @var int
		 */
		protected $id;

		/**
		 * question (En and Fr)
		 *
		 * @var array
		 */
		protected $question;

		/**
		 * answer (En and Fr)
		 *
		 * @var array
		 */
		protected $answer;

		/**
		 * wiki link
		 *
		 * @var string
		 */
		protected $wikiURL;

		/**
		 * tags (array of ids)
		 *
		 * @var array
		 */
		protected $tags;

		function __construct($id = 0, $question = "Not Initialized", $answer ="Not Initialized")
		{
			$this->id = $id;
			$question = (!is_array($question)) ?  array('en_EN' => $question) : $question ;
			$this->question = $question;
			$answer = (!is_array($answer)) ?  array('en_EN' => $answer) : $answer ;
			$this->answer = $answer;
			$this->wikiURL = '';

			return $this;
		}

		/**
		 * Gets the id.
		 *
		 * @return int
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * Sets the id.
		 *
		 * @param int $id the id
		 *
		 * @return self
		 */
		public function setId($id)
		{
			$this->id = $id;

			return $this;
		}

		/**
		 * Get the questions in all languages
		 * @return array Questions
		 */
		public function getQuestionArray()
		{
			return $this->question;
		}

		/**
		 * Gets the question in the language asked. English by default
		 *
		 * @return array
		 */
		public function getQuestion($lang = 'en_EN')
		{

            if (!is_array($this->question)) {
                $this->question = array('en_EN' => $this->question);
            }
            $question = (array_key_exists($lang, $this->getQuestionArray())) ? $this->question[$lang] : $this->question['en_EN'] ;
            return $question;
		}

		/**
		 * Sets the questions (En and Fr).
		 *
		 * @param array $question the question
		 *
		 * @return self
		 */
		public function setQuestionArray(array $question)
		{
			$this->question = $question;

			return $this;
		}

		/**
		 * Set a question for a specific language. English by default
		 * @param string $value Name of the question
		 * @param string $lang  Language of the question
		 */
		public function setQuestion($value, $lang = 'en_EN')
		{
			$this->question[$lang] = $value;
		}


		/**
		 * Get the answers in all languages
		 * @return array Answers
		 */
		public function getAnswerArray()
		{
			return $this->answer;
		}

		/**
		 * Gets the answer in the language asked. English by default
		 *
		 * @return array
		 */
		public function getAnswer($lang = 'en_EN')
		{
            if (!is_array($this->answer)) {
                $this->answer = array('en_EN' => $this->answer);
            }
            $answer = (array_key_exists($lang, $this->getAnswerArray())) ? $this->answer[$lang] : $this->answer['en_EN'] ;
            return $answer;
        }



		/**
		 * Sets the answer (En and Fr).
		 *
		 * @param array $answer the answer
		 *
		 * @return self
		 */
		public function setAnswerArray(array $answer)
		{
			$this->answer = $answer;

			return $this;
		}

		/**
		 * Set a answer for a specific language. English by default
		 * @param string $value Name of the answer
		 * @param string $lang  Language of the answer
		 */
		public function setAnswer($value, $lang = 'en_EN')
		{
			$this->answer[$lang] = $value;
		}

		/**
		 * Gets the wiki URL.
		 *
		 * @return string
		 */
		public function getWikiURL()
		{
			return $this->wikiURL;
		}

		/**
		 * Sets the wiki URL.
		 *
		 * @param string $wikiURL the wiki URL
		 *
		 * @return self
		 */
		public function setWikiURL($wikiURL)
		{
			$this->wikiURL = $wikiURL;

			return $this;
		}

		/**
		 * Gets the tags (array of ids).
		 *
		 * @return array
		 */
		public function getTags()
		{
			return $this->tags;
		}

		/**
		 * Sets the tags (array of ids).
		 *
		 * @param array $tags the tags
		 *
		 * @return self
		 */
		public function setTags(array $tags)
		{
			$this->tags = $tags;

			return $this;
		}

		/**
		 * Check if a question is tagged with $tag
		 * @param  Tag     $tag Tag to be tested
		 * @return boolean      true if yes, else false
		 */
		public function isTagged(Tag $tag)
		{
			return in_array($tag->getId(), $this->getTags());
		}

		/**
		 * Add tags to a question by their ids
		 * @param array $tags array of tag ids to be added
		 */
		public function addTagsIds(array $tags)
		{
			$this->setTags(array_merge($this->getTags(), $tags));
		}

		/**
		 * Add tags to a question
		 * @param array $tags Array of Tag objects
		 */
		public function addTags(array $tags){
			$tagsToAdd = array();

			foreach ($tags as $tag) {
				if ($tag instanceof Tag && !$this->isTagged($tag)) {
					array_push($tagsToAdd, $tag->getId());
				}
			}

			$this->addTagsIds($tagsToAdd);
		}

		/**
		 * Delete a tag from the question
		 * @param  Tag    $tag Tag object to be deleted
		 */
		public function deleteTag(Tag $tag)
		{
			if ($this->isTagged($tag)) {
				$this->setTags(array_diff($this->getTags(), array($tag->getId())));
			}
		}

		/**
		 * Delete several tags from the question
		 * @param  array  $tags Array of Tag objects to be deleted
		 */
		public function deleteTags(array $tags)
		{
			foreach ($tags as $tag) {
				$this->deleteTag($tag);
			}
		}

		/**
		 * Returns all args into an array, except $excludeArgs
		 * @param  array  $renameArgs 	Array of args to ignore
		 * @param  array  $excludeArgs 	Array of args to ignore
		 * @return array               	Plain array of the object args
		 */
		public function serialize($renameArgs= array('id' => 'pkQuestion', 'wikiURL' => 'wiki_url'), $excludeArgs = array('tags'))
		{
			$response = array();
			$args = get_class_vars(get_class($this));
			$argsName = array_keys($args);
			$argsName = array_diff($argsName, $excludeArgs);
			foreach ($argsName as $name) {
				if (is_array($this->$name)) {
					foreach ($this->$name as $lang => $value) {
						$response[$name.'_'.substr($lang, 0, 2)] = $value;
					}
				} else {
					$response[$name] = $this->$name;
				}
			}
			foreach ($renameArgs as $oldKey => $newKey) {
				if (array_key_exists($oldKey, $response)) {
					$response[$newKey] = $response[$oldKey];
					unset($response[$oldKey]);
				}
			}
			return $response;
		}
}