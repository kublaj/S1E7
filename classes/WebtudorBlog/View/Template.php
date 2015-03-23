<?php

namespace WebtudorBlog\View;

class Template {
	/**
	 * @var string
	 */
	protected $file;

	/**
	 * Template directory
	 * @var string
	 */
	protected $templateDir;

	/**
	 * Data for the template
	 * @var array
	 */
	protected $data = array();

	/**
	 * @param string $file
	 */
	public function __construct($file) {
		$this->file = $file;
		$this->templateDir = PROJECT_ROOT . '/templates/';
	}

	/**
	 * Assign a variable to a template
	 *
	 * @param string $variable
	 * @param mixed $value
	 *
	 * @return void
	 */
	public function assign($variable, $value) {
		$this->data[$variable] = $value;
	}

	/**
	 * Render the template
	 *
	 * @return string
	 *
	 * @throws \Exception
	 */
	public function render() {
		if (!file_exists($this->templateDir . $this->file . '.php')) {
			throw new \Exception('Template file not found: ' . $this->file);
		}

		//Catch all output
		ob_start();

		//Extract the array keys as local variables
		extract($this->data);

		//Include the file
		include($this->templateDir . $this->file . '.php');

		//Get the contents of the output
		$content = ob_get_contents();

		//Clean the output buffer
		ob_end_clean();

		return $content;
	}
}
