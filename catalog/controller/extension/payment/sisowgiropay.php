<?php
include 'sisow.php';

class ControllerExtensionPaymentSisowGiropay extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowgiropay');
	}

	public function notify() {
		$this->_notify('sisowgiropay');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowgiropay');
	}
}
?>
