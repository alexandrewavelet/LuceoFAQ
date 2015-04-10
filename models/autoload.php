<?php

	function __autoload($className) {
		$modelsPath = '/models\/';

		$modelsFolders = array(
			$modelsPath.'classes/',
			$modelsPath.'database/'
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
			echo 'Class '.$className.' not found.';
			exit();
		}

		include_once($fileName);
	}