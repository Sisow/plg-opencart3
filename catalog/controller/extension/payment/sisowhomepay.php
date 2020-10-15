<?php
include 'sisow.php';

class ControllerExtensionPaymentSisowHomepay extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowhomepay');
	}

	public function notify() {
		$this->_notify('sisowhomepay');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowhomepay');
	}
}
?>
