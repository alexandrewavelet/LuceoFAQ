<?php

	require_once 'databaseConnection.php';

	/**
	* Class QuestionsDA : get the Questions from the database
	*/
	class QuestionsDA
	{
		private static $_db;

		public static function init(){
			self::$_db = new DatabaseConnection();
		}

		public static function getQuestion($idQuestion){
			return true;
		}

	}

	QuestionsDA::init();