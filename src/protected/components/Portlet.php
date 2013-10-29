<?php

/**
 * Description of Portlet
 */
class Portlet extends CWidget
{
	public $title;
	public $visible = true;

	public function init()
	{
		if ($this->visible) {
			// render the portlet starting frame
			// render the portlet title
		}
	}

	public function run()
	{
		if ($this->visible) {
			$this->renderContent();
			// render the portlet ending frame
		}
	}

	protected function renderContent()
	{
		// child class should override this method
		// to render the actual body content
	}
}