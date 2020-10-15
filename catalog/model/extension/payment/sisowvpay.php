<?php 

class ModelExtensionPaymentSisowVpay extends Model {
	public function getMethod($address = false, $total = false) {
		if (!$this->config->get('payment_sisowvpay_status')) {
			return false;
		}
		
		/*if ($this->currency->getCode() != 'EUR') {
			return false;
		}*/
		
		if($total == 0){
			return false;
		}
		
		if ($this->config->get('payment_sisowvpay_geo_zone_id')) {
      		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('payment_sisowvpay_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
			if (!$query->num_rows) {
     	  		return false;
			}	
		}

		if ($total) {
			if ($this->config->get('payment_sisowvpay_total') && $total < $this->config->get('payment_sisowvpay_total')) {
				return false;
			}
			if ($this->config->get('payment_sisowvpay_totalmax') && $total > $this->config->get('payment_sisowvpay_totalmax')) {
				return false;
			}
		}

		$this->load->language('extension/payment/sisowvpay');
		$data = array( 
			'terms'      => '',
			'code'		=> 'sisowvpay',
			'title'		=> $this->language->get('text_title'),
			'sort_order'	=> $this->config->get('payment_sisowvpay_sort_order')
			);
		return $data;
	}
}
?>
