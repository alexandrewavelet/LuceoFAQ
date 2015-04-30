<?php

	/**
	* Class Search : Contains all the params of the search
	*/
	class Search
	{

		protected $query;
		protected $tags;

		function __construct($query = '', $tags = array())
		{
			$this->query = $query;
			$this->tags = $tags;
		}

		public function getQuery()
		{
			return $this->query;
		}

		public function setQuery($query)
		{
			$this->query = $query;
			return $this;
		}

		public function getTags()
		{
			return $this->tags;
		}

		public function setTags($tags)
		{
			$this->tags = $tags;
			return $this;
		}

		/**
		 * Returns the tags separated with commas
		 * @return string comma separated tags
		 */
		public function getTagsText()
		{
			return implode(', ', $this->tags);
		}

		function setTagsFromSearch(array $tagsSearch)
		{
			$this->setTags(array_keys($tagsSearch));
		}
	}