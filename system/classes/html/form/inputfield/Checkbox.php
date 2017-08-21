<?php namespace Html\Form\InputField;

/**
 * A helper InputField class for checkboxes
 * 
 * @author Adam Buckley <adam@2pisoftware.com>
 */
class Checkbox extends \Html\Form\InputField {
	
	public $type = "checkbox";
	
	/**
	 * setValue override to instead call setChecked
	 * 
	 * @param Mixed $value checked value, set to a truthy value to be checked (1, true, 'yes', etc.)
	 */
	public function setValue($value) {
		if (!!$value) {
			$this->setChecked('checked');
		}

		return $this;
	}

}
