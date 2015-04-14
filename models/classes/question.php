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
		 * label (En and Fr)
		 *
		 * @var array
		 */
		protected $label;

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
		protected $wikiLink;

		/**
		 * tags (array of ids)
		 *
		 * @var array
		 */
		protected $tags;

		function __construct($id, $label, $answer)
		{
			$this->id = $id;
			$label = (!is_array($label)) ?  array('en_EN' => $label) : $label ;
			$this->label = $label;
			$answer = (!is_array($answer)) ?  array('en_EN' => $answer) : $answer ;
			$this->answer = $answer;

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
		 * Get the labels in all languages
		 * @return array Labels
		 */
		public function getLabelArray()
		{
			return $this->label;
		}

		/**
		 * Gets the label in the language asked. English by default
		 *
		 * @return array
		 */
		public function getLabel($lang = 'en_EN')
		{
			$label = (array_key_exists($lang, $this->getLabelArray())) ? $this->label[$lang] : $this->label['en_EN'] ;
			return $label;
		}

		/**
		 * Sets the labels (En and Fr).
		 *
		 * @param array $label the label
		 *
		 * @return self
		 */
		public function setLabelArray(array $label)
		{
			$this->label = $label;

			return $this;
		}

		/**
		 * Set a label for a specific language. English by default
		 * @param string $value Name of the label
		 * @param string $lang  Language of the label
		 */
		public function setLabel($value, $lang = 'en_EN')
		{
			$this->label[$lang] = $value;
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
		 * Gets the wiki link.
		 *
		 * @return string
		 */
		public function getWikiLink()
		{
			return $this->wikiLink;
		}

		/**
		 * Sets the wiki link.
		 *
		 * @param string $wikiLink the wiki link
		 *
		 * @return self
		 */
		public function setWikiLink($wikiLink)
		{
			$this->wikiLink = $wikiLink;

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
}