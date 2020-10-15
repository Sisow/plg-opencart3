<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowVisa extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowvisa');
	}

	public function validate() {
		return $this->_validate('sisowvisa');
	}
}
?>
