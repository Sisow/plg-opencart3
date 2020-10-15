<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowFocum extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowfocum');
	}

	public function validate() {
		return $this->_validate('sisowfocum');
	}
}
?>
