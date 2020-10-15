<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowHomepay extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowhomepay');
	}

	public function validate() {
		return $this->_validate('sisowhomepay');
	}
}
?>
