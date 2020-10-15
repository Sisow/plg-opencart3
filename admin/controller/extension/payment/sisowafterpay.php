<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowAfterpay extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowafterpay');
	}

	public function validate() {
		return $this->_validate('sisowafterpay');
	}
}
?>
