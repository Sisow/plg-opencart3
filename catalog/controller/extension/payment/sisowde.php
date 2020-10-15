<?php
include 'sisow.php';

class ControllerExtensionPaymentSisowDE extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowde');
	}

	public function notify() {
		$this->_notify('sisowde');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowde');
	}
}
?>
