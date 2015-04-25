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

		/**
		 * Insert a new tag in the DB
		 * @param  Tag     $tag          	Tag to add
		 * @param  boolean $returnsArray 	True if we need an array in return
		 * @return mixed                	Id of the Tag added if success, else false
		 */
		public static function insertTag(Tag $tag, $returnsArray = false)
		{
			self::$_db->prepareInsertStatement('tags', $tag->serialize(array(), array('id', 'numberOfQuestions')));
			// For the purpose of debug, use :
			//echo self::$_db->getStatement()->debugDumpParams();
			$executed = self::$_db->executeStatement();
			if ($executed) {
				$response = ($returnsArray) ? array('id' => self::$_db->getInsertId(), 'message' => 'The tag was added successfully.') : self::$_db->getInsertId() ;
			} else {
				$response = ($returnsArray) ? array('error' => true, 'message' => self::$_db->getErrorMessage()) : false ;
			}

			return $response;
		}

		public static function getTagsList()
		{
			return self::$_db->execSQL('SELECT t.pkTag AS id, t.label_en AS label, COUNT(*) AS numberOfQuestions FROM tags t LEFT JOIN questions_tags qt ON t.pkTag = qt.pkTag GROUP BY id, label ORDER BY label', 'Tag');
		}

		/**
		 * Gets the id of a tag if it exists in DB (based on its name), à if new Tag
		 * @param  string $name Label of the tag to look for
		 * @return int       	Id of the Tag
		 */
		public static function getTagID($name)
		{
			$resSQL = self::$_db->execSQL('SELECT IFNULL((SELECT pkTag FROM tags WHERE label_en = "'.$name.'"), 0) AS id'); // Has to be improved/changed with new select method/object
			return $resSQL[0]['id'];
		}

	}

	TagsDA::init();