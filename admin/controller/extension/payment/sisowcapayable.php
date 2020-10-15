<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowCapayable extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowcapayable');
	}

	public function validate() {
		return $this->_validate('sisowcapayable');
	}
}
?>
