<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowMC extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowmc');
	}

	public function validate() {
		return $this->_validate('sisowmc');
	}
}
?>
