<?php

namespace Controller;

/**
 * Abstract parent controller.
 */
abstract class AbstractController {
	/**
	 * Returns an action for the given URL structure
	 *
	 * @param array $urlParts
	 *
	 * @return null|string
	 */
	public static function getAction($urlParts) {
		return null;
	}
}

