<?php
include 'sisow.php';

class ControllerExtensionPaymentSisowVVV extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowvvv');
	}

	public function notify() {
		$this->_notify('sisowvvv');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowvvv');
	}
}
?>
