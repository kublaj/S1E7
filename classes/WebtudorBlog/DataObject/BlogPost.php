<?php

namespace WebtudorBlog\DataObject;
use DateTime;

/**
 *
 */
class BlogPost {
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var DateTime
	 */
	protected $created;

	/**
	 * @var string
	 */
	protected $slug;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $excerpt;

	/**
	 * @var string
	 */
	protected $content;

	/**
	 * Returns the blogpost ID.
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Sets the blogpost ID.
	 *
	 * @param int $id
	 *
	 * @return BlogPost
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * Returns the time the blogpost was created.
	 *
	 * @return DateTime
	 */
	public function getCreated() {
		return $this->created;
	}

	/**
	 * Sets the datetime when the blogpost was created.
	 *
	 * @param DateTime $created
	 *
	 * @return BlogPost
	 */
	public function setCreated(DateTime $created) {
		$this->created = $created;
		return $this;
	}

	/**
	 * Returns the URL slug
	 *
	 * @return string
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * Sets the URL slug
	 *
	 * @param string $slug
	 *
	 * @return BlogPost
	 */
	public function setSlug($slug) {
		$this->slug = $slug;
		return $this;
	}

	/**
	 * Returns the blogpost title
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the blogpost title
	 *
	 * @param string $title
	 *
	 * @return BlogPost
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * Returns the blogpost excerpt
	 *
	 * @return string
	 */
	public function getExcerpt() {
		return $this->excerpt;
	}

	/**
	 * Sets the blogpost excerpt
	 *
	 * @param string $excerpt
	 *
	 * @return BlogPost
	 */
	public function setExcerpt($excerpt) {
		$this->excerpt = $excerpt;
		return $this;
	}

	/**
	 * Returns the blogpost content.
	 *
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Sets the content of the blogpost.
	 *
	 * @param string $content
	 *
	 * @return BlogPost
	 */
	public function setContent($content) {
		$this->content = $content;
		return $this;
	}
}

