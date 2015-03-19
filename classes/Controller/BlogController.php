<?php

namespace Controller;

/**
 * Controller handling blog-related requests
 */
class BlogController extends AbstractController {
	/**
	 * Returns an action for the given URL structure
	 *
	 * @param array $urlParts
	 *
	 * @return null|string
	 */
	public static function getAction($urlParts) {
		if ($urlParts[1] == 'blog') {
			// If the second part is available,
			if (isset($urlParts[2])) {
				return 'show';
			} else {
				return 'list';
			}
		}
		return null;
	}

	/**
	 * Show a blogpost
	 *
	 * @param array $urlParts
	 *
	 * @return string
	 */
	public function doShow($urlParts) {

	}

	/**
	 * List all blog posts
	 *
	 * @param array $urlParts
	 *
	 * @return string
	 */
	public function doList($urlParts) {

	}
}

