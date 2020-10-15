<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowSpraypay extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowspraypay');
	}

	public function validate() {
		return $this->_validate('sisowspraypay');
	}
}
?>
