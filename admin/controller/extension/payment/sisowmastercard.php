<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowMastercard extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowmastercard');
	}

	public function validate() {
		return $this->_validate('sisowmastercard');
	}
}
?>
