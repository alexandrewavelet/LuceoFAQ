<?php

	/**
	* Class Tag
	*/
	class Tag
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

		function __construct($id, $label)
		{
			$this->id = $id;
			$label = (!is_array($label)) ?  array('en_EN' => $label) : $label ;
			$this->label = $label;

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
		 * Sets the label (En and Fr).
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
	}