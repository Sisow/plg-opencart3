<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowVisa extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowvisa');
	}

	public function notify() {
		$this->_notify('sisowvisa');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowvisa');
	}
}
?>
