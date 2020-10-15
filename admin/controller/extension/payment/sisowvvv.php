<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowVVV extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowvvv');
	}

	public function validate() {
		return $this->_validate('sisowvvv');
	}
}
?>
