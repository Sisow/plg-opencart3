<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowKbc extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowkbc');
	}

	public function validate() {
		return $this->_validate('sisowkbc');
	}
}
?>
