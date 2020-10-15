<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowBillink extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowbillink');
	}

	public function validate() {
		return $this->_validate('sisowbillink');
	}
}
?>
