<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowVpay extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowvpay');
	}

	public function validate() {
		return $this->_validate('sisowvpay');
	}
}
?>
