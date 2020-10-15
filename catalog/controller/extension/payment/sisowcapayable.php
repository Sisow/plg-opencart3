<?php
include 'sisow.php';

class ControllerExtensionPaymentSisowCapayable extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowcapayable');
	}

	public function notify() {
		$this->_notify('sisowcapayable');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowcapayable');
	}
}
?>
