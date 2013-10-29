<?php
class MyComponent extends CApplicationComponent
{
    public $someconfig='somedefault';

    public function init() {
        // Init this component
        // $this->someconfig is already available
    }

    public function msg() {
		echo 'This is my component';
	}
}
?>