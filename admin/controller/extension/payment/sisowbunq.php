<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowBunq extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowbunq');
	}

	public function validate() {
		return $this->_validate('sisowbunq');
	}
}
?>
