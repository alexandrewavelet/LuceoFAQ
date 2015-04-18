<?php

	// Autoload function to get the classes needed automatically

	function __autoload($className) {
		$modelsPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR ;

		$modelsFolders = array(
			$modelsPath.'actions' . DIRECTORY_SEPARATOR ,
			$modelsPath.'classes' . DIRECTORY_SEPARATOR ,
			$modelsPath.'dataadapter' . DIRECTORY_SEPARATOR
		);

		$fileName = '';
		$i = 0;
		while ($fileName == '' && $i < count($modelsFolders)) {
			$file = $modelsFolders[$i].strtolower($className).'.php';
			if (is_file($file)) {
				$fileName = $file;
			}
			$i++;
		}

		if ($fileName == '') {
			$response = array(
				'error' => true,
				'message' => 'The class "'.$className.'" is not found.'
			);
			echo json_encode($response);
			exit();
		}

		require_once($fileName);
	}