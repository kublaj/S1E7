<?php

namespace WebtudorBlog\Model;

use WebtudorBlog\DataObject\BlogPost;

class BlogModel extends AbstractModel {
	/**
	 * Convert SQL row to BlogPost object
	 *
	 * @param array $row
	 *
	 * @return BlogPost
	 */
	protected function rowToBlogPost($row) {
		$post = new BlogPost();
		$post->setId($row['id']);
		$post->setCreated(new \DateTime($row['created']));
		$post->setSlug($row['slug']);
		$post->setTitle($row['title']);
		$post->setExcerpt($row['excerpt']);
		$post->setContent($row['content']);
		return $post;
	}

	/**
	 * Returns all blogposts.
	 *
	 * @return BlogPost[]
	 * @throws ModelException
	 */
	public function getAll() {
		$sql = '
			SELECT
				id,
				created,
				slug,
				title,
				excerpt,
				content
			FROM posts
			ORDER BY created DESC
		';
		$result = $this->query($sql, array());

		$posts = array();
		foreach ($result as $row) {
			$posts[] = $this->rowToBlogPost($row);
		}
		return $posts;
	}

	/**
	 * Get a single blogpost by URL slug.
	 *
	 * @param string $slug
	 *
	 * @return BlogPost
	 *
	 * @throws ModelException
	 */
	public function getBySlug($slug) {
		$sql = '
			SELECT
				id,
				created,
				slug,
				title,
				excerpt,
				content
			FROM posts
			WHERE
				slug=:slug
			ORDER BY created DESC
		';
		$result = $this->query($sql, array('slug' => $slug));

		if (!count($result)) {
			throw new ModelException('Blogpost not found!');
		}

		return $this->rowToBlogPost($result[0]);
	}
}
