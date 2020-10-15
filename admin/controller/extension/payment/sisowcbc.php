<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowCbc extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowcbc');
	}

	public function validate() {
		return $this->_validate('sisowcbc');
	}
}
?>
