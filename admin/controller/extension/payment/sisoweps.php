<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowEps extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisoweps');
	}

	public function validate() {
		return $this->_validate('sisoweps');
	}
}
?>
