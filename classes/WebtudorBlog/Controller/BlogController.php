<?php

namespace WebtudorBlog\Controller;
use WebtudorBlog\Model\BlogModel;
use WebtudorBlog\View\Template;

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
		// If the first part is 'blog', use this controller
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
		$slug = $urlParts[2];

		$model = new BlogModel();
		$post = $model->getBySlug($slug);

		$view = new Template('blog/show');
		$view->assign('post', $post);
		return $view->render();
	}

	/**
	 * List all blog posts
	 *
	 * @param array $urlParts
	 *
	 * @return string
	 */
	public function doList($urlParts) {
		$model = new BlogModel();
		$posts = $model->getAll();

		$view = new Template('blog/list');
		$view->assign('posts', $posts);
		return $view->render();
	}
}

