<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowMaestro extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowmaestro');
	}

	public function validate() {
		return $this->_validate('sisowmaestro');
	}
}
?>
