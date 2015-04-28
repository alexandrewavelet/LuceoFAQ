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

		/**
		 * number of questions having this tag
		 *
		 * @var int
		 */
		protected $numberOfQuestions;

		function __construct($id = 0, $label = 'Not initialized', $numberOfQuestions = 0)
		{
			$this->id = $id;
			$label = (!is_array($label)) ?  array('en_EN' => $label) : $label ;
			$this->label = $label;
			$this->numberOfQuestions = $numberOfQuestions;

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
			if (!is_array($this->label)) {
				$this->label = array('en_EN' => $this->label);
			}
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

		/**
		* Gets the number of questions having this tag.
		*
		* @return int
		*/
		public function getNumberOfQuestions()
		{
			return $this->numberOfQuestions;
		}

		/**
		* Sets the number of questions having this tag.
		*
		* @param int $numberOfQuestions the number of questions
		*
		* @return self
		*/
		public function setNumberOfQuestions($numberOfQuestions)
		{
			$this->numberOfQuestions = $numberOfQuestions;

			return $this;
		}

		/**
		 * Returns all args into an array, except $excludeArgs
		 * @param  array  $renameArgs 	Array of args to ignore
		 * @param  array  $excludeArgs 	Array of args to ignore
		 * @return array               	Plain array of the object args
		 */
		public function serialize($renameArgs= array('id' => 'pkTag'), $excludeArgs = array('numberOfQuestions'))
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