<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowWG extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowwg');
	}

	public function validate() {
		return $this->_validate('sisowwg');
	}
}
?>
