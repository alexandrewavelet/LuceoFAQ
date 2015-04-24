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
				array_push($tagsObjects, new Tag($tag['id'], $tag['name']));
			}

			return $tagsObjects;
		}

	}