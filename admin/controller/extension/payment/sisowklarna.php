<?php 

include 'sisow/sisow.php';

class ControllerExtensionPaymentSisowKlarna extends ControllerExtensionPaymentSisow {
	public function index() {
		$this->_index('sisowklarna');
	}

	public function validate() {
		return $this->_validate('sisowklarna');
	}
}
?>
