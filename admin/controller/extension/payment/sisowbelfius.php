<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowBelfius extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowbelfius');
	}

	public function validate() {
		return $this->_validate('sisowbelfius');
	}
}
?>
