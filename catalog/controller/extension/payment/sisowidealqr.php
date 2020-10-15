<?php
include 'sisow.php';

class ControllerExtensionPaymentSisowIdealqr extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowidealqr');
	}

	public function notify() {
		$this->_notify('sisowidealqr');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowidealqr');
	}
}
?>
