<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowGiropay extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowgiropay');
	}

	public function validate() {
		return $this->_validate('sisowgiropay');
	}
}
?>
