<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowIdeal extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowideal');
	}

	public function validate() {
		return $this->_validate('sisowideal');
	}
}
?>
