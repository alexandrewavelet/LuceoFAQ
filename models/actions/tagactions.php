<?php

	/**
	* Class which executes common actions for Tag class
	*/
	class TagActions
	{

		/**
		 * Transform an array of values to an array of Tag objects
		 * @param  array $tagsArray Array containing the values (id, name)
		 * @return array            Array with Tag objects
		 */
		public static function getObjectsTagFromArray($tagsArray)
		{
			$tagsObjects = array();
			foreach ($tagsArray as $tag) {
				array_push($tagsObjects, new Tag(TagsDA::getTagID($tag['name']), $tag['name']));
			}

			return $tagsObjects;
		}

		/**
		 * Gets all the tags
		 * @return array  Array with Tag objects
		 */
		public static function getTagsList()
		{
			return TagsDA::getTagsList();
		}

		public static function getTagsQuestion($idQuestion)
		{
			return TagsDA::getTagsQuestion($idQuestion);
		}

		/**
		 * Gets tags filtered by their label
		 * @param  string 	$term 			Term to look for in the labels
		 * @param  boolean 	$returnsArray 	True if we want an array as return
		 * @return array       				Array of tags labels
		 */
		public static function getTagsListFiltered($term, $returnsArray = false)
		{
			return TagsDA::getTagsListByLabel($term);
		}

	}