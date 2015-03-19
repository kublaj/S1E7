<?php

namespace Controller;
use View\Template;

/**
 * Controller to show error pages.
 */
class ErrorController extends AbstractController {
	/**
	 * Show the not found page
	 *
	 * @param array $urlParts
	 *
	 * @return string
	 */
	public function doNotFound($urlParts) {
		$view = new Template('error/notFound');
		return $view->render();
	}
}

