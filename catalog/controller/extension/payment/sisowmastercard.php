<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowMastercard extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowmastercard');
	}

	public function notify() {
		$this->_notify('sisowmastercard');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowmastercard');
	}
}
?>
