<?php
include 'sisow.php';

class ControllerExtensionPaymentSisowBelfius extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowbelfius');
	}

	public function notify() {
		$this->_notify('sisowbelfius');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowbelfius');
	}
}
?>
