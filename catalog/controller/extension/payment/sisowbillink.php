<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowBillink extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowbillink');
	}

	public function notify() {
		$this->_notify('sisowbillink');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowbillink');
	}
}
?>
