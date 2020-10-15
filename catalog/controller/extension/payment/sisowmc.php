<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowMC extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowmc');
	}

	public function notify() {
		$this->_notify('sisowmc');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowmc');
	}
}
?>
