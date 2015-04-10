<?php

	// Actions called via AJAX
	// Transform to a class with one public static method (and the rest in privates) later

	include_once('/models/autoload.php');

	if(isset($_POST['ajax_request'])) {
		$class = $_POST['className'];
		if (class_exists($class)) {
			$method = $_POST['methodName'];

			if (method_exists($class, $method)) {
				// Get the methods param here - EXPERIMENTAL : Need testing
				$params = json_decode($_POST['params'], true);
				array_push($params, true); // Adding true forces the method to return an array

				$aReturn = call_user_func_array($class.'::'.$method, $params);
			}else{
				$aReturn = array(
					'error' => true,
					'message' => 'The method "'.$method.'" doesn\'t exist for the '.$class.' class.';
				);
			}
		}else{
			$aReturn = array(
				'error' => true,
				'message' => 'The class "'.$class.'" doesn\'t exist.';
			);
		}
	}else{
		$aReturn = array(
			'error' => true,
			'message' => 'The AJAX request is not valid.';
		);
	}

	$jsonReturn = json_encode($aReturn);
	echo $jsonReturn;