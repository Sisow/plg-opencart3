<?php

include 'sisow.php';

class ControllerExtensionPaymentSisowMaestro extends ControllerExtensionPaymentSisow {
	public function index() {
		return $this->_index('sisowmaestro');
	}

	public function notify() {
		$this->_notify('sisowmaestro');
	}

	public function redirectbank() {
		$this->_redirectbank('sisowmaestro');
	}
}
?>
