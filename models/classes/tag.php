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
			$label = (!is_array($label)) ?  array('En' => $label) : $label ;
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
	}