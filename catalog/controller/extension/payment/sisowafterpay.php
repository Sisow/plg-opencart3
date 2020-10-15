<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowAfterpay extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowafterpay');
	}

	public function notify() {
		$this->_notify('sisowafterpay');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowafterpay');
	}
}
?>
