<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowSpraypay extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowspraypay');
	}

	public function notify() {
		$this->_notify('sisowspraypay');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowspraypay');
	}
}
?>
