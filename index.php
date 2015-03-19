<?php

use Controller\AbstractController;
use Controller\ErrorController;

/**
 * Automatically loads a class from the classes directory. Namespace\Classname becomes classes/Namespace/Classname.php
 *
 * @param string $className
 *
 * @return void
 */
function __autoload($className) {
	$file = __DIR__ . '/classes/' . strtr($className, array('\\' => DIRECTORY_SEPARATOR)) . '.php';
	require($file);
}


// Split the request URI part into pieces
// e.g. /posts/some-post becomes ['', 'posts', 'some-post']
$url = explode('/', $_SERVER['REQUEST_URI']);


//A list of all controllers
$controllers = array();

//Loop over all controllers and find the one that is actually going to handle our request.
foreach ($controllers as $controllerClass) {
	/**
	 * @var AbstractController $controllerClass
	 */
	$action = $controllerClass::getAction($url);
	if ($action !== null) {
		$controller = new $controllerClass();
		$functionName = 'do' . ucfirst($action);

		echo $controller->$functionName($url);

		break;
	}
}


// If no functionName is set, we didn't found any actions. Show the error page.
if (!isset($functionName)) {
	$controller = new ErrorController();
	echo $controller->doNotFound($url);
}
