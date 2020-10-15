<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowDE extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowde');
	}

	public function validate() {
		return $this->_validate('sisowde');
	}
}
?>
