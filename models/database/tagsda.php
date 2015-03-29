<?php

	require_once 'databaseConnection.php';

	/**
	* Class TagsDA : get the Questions from the database
	*/
	class TagsDA
	{
		private static $_db;

		public static function init(){
			self::$_db = new DatabaseConnection();
		}

		public static function getTag($idTag){
			return true;
		}

	}

	TagsDA::init();