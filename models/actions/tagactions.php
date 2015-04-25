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

		public static function getTagsList()
		{
			$tags = array();

			$tagsArray = TagsDA::getTagsList();
			// foreach ($tagsArray as $tag) {
			// 	array_push($tags, new Tag($tag['id'], $tag['label'], $tag['numberOfQuestions']));
			// }

			return $tagsArray;
		}

	}