<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowFocum extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowfocum');
	}

	public function notify() {
		$this->_notify('sisowfocum');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowfocum');
	}
}
?>
