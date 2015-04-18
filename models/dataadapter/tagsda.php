<?php

	require_once 'databaseConnection.php';

	/**
	* Class TagsDA : Data Adapter for the Tag class
	*/
	class TagsDA
	{
		private static $_db;

		public static function init(){
			self::$_db = new DatabaseConnection();
		}

		/**
		 * TEST FUNCTION ; TODO : implement getTag, get a tag from the database based on its id, then update this doc
		 * @param  int $idTag Id of the tag to retrieve
		 * @return Tag        Tag object
		 */
		public static function getTag($idTag){
			return true;
		}

	}

	TagsDA::init();