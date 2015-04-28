<?php

	// Autoload : Kludge, find a better way
	require_once(dirname(__DIR__) . '/models/autoload.php');

	/**
	* Class which handle AJAX calls for the application
	*/
	class AjaxActions
	{

		/**
		 * Class from which the method will be called
		 * @var string
		 */
		protected $class;

		/**
		 * Method to call
		 * @var string
		 */
		protected $method;

		/**
		 * List of parameters to pass to the method
		 * @var array
		 */
		protected $args;

		function __construct($class = '', $method = '', $args = array())
		{
			$this->class = $class;
			$this->method = $method;
			$this->args = $args;
		}

		/**
		 * Run the method affected to the AjaxAction object : Splitted in steps to ensure the method can be called, then execute it
		 * @return json return of the method or error message
		 */
		public function perform()
		{
			if (!$this->class == '' && !$this->method == '') {
				return $this->ValidateClassStep();
			} else {
				$response = array(
					'error' => true,
					'message' => 'Either the class or the method is not specified.'
				);
				return json_encode($response);
			}
		}

		/**
		 * First step of perform() : verify if the class exists
		 * @return json return of the method or error message
		 */
		private function validateClassStep()
		{
			if (class_exists($this->class)) {
				return $this->validateMethodStep();
			}else{
				$response = array(
					'error' => true,
					'message' => 'The class "'.$this->class.'" doesn\'t exist.'
				);
				return json_encode($response);
			}
		}

		/**
		 * Second step of perform() : Verify if the method exists in the class
		 * @return json return of the method or error message
		 */
		private function validateMethodStep()
		{
			if (method_exists($this->class, $this->method)) {
				return $this->executeStep();
			}else{
				$response = array(
					'error' => true,
					'message' => 'The method "'.$this->method.'" doesn\'t exist for the '.$this->class.' class.'
				);
				return json_encode($response);
			}
		}

		/**
		 * Third step of perform() : Executes the method
		 * @return json return of the method or error message
		 */
		private function executeStep()
		{
			array_push($this->args, true); // Adding true forces the method to return an array
			$response = call_user_func_array($this->class.'::'.$this->method, $this->args);
			if ($response || is_array($response)) { // Methods can sometimes return empty array (autocomplete method). It's not a bug, it's a feature
				return json_encode($response);
			}else{
				$response = array(
					'error' => true,
					'message' => 'Something happened while trying to execute the method '.$this->class.'::'.$this->method
				);
				return json_encode($response);
			}
		}

	}

	// We get the POST parameters or set them empty by default
	$class = (isset($_POST['phpclass'])) ? $_POST['phpclass'] : '' ;
	$method = (isset($_POST['method'])) ? $_POST['method'] : '' ;
	$args = (isset($_POST['args'])) ? $_POST['args'] : array() ;

	// Function call
	$ajax = new AjaxActions($class, $method, $args);
	echo $ajax->perform();