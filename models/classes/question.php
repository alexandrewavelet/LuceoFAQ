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
			$label = (!is_array($label)) ?  array('En' => $label) : $label ;
			$this->label = $label;
			$answer = (!is_array($answer)) ?  array('En' => $answer) : $answer ;
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
		 * Gets the label (En and Fr).
		 *
		 * @return array
		 */
		public function getLabel()
		{
			return $this->label;
		}

		/**
		 * Sets the label (En and Fr).
		 *
		 * @param array $label the label
		 *
		 * @return self
		 */
		public function setLabel(array $label)
		{
			$this->label = $label;

			return $this;
		}

		/**
		 * Gets the answer (En and Fr).
		 *
		 * @return array
		 */
		public function getAnswer()
		{
			return $this->answer;
		}

		/**
		 * Sets the answer (En and Fr).
		 *
		 * @param array $answer the answer
		 *
		 * @return self
		 */
		public function setAnswer(array $answer)
		{
			$this->answer = $answer;

			return $this;
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
}