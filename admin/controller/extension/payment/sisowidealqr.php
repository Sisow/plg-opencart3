<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowIdealqr extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowidealqr');
	}

	public function validate() {
		return $this->_validate('sisowidealqr');
	}
}
?>
