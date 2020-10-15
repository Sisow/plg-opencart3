<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowWG extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowwg');
	}

	public function notify() {
		$this->_notify('sisowwg');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowwg');
	}
}
?>
