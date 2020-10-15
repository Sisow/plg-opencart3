<?php
include 'sisow.php';

class ControllerExtensionPaymentSisowCbc extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowcbc');
	}

	public function notify() {
		$this->_notify('sisowcbc');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowcbc');
	}
}
?>
