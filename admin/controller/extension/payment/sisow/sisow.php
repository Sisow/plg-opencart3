<?php 

class ControllerExtensionPaymentSisow extends Controller {
	public $error = array(); 

	public function _index($payment) {		
		$this->load->language('extension/payment/sisow'); // . $payment);
		$this->load->model('setting/setting');

		$this->document->setTitle($this->language->get('heading_title_' . $payment));

		// Sisow ecare payment fee tonen bij checkout
		$do = false;
		$this->load->model('setting/extension');

		if($payment != 'capayable')
		{
			$totals = $this->model_setting_extension->getInstalled('total');

			foreach ($totals as $total) {
				if ($total == $payment . 'fee') {
					$do = true;
					break;
				}
			}
			
			if (!$do) {
				$this->model_setting_extension->install('total', $payment . 'fee');
				$post['total_' . $payment . 'fee_sort_order'] = 4;
				$post['total_' . $payment . 'fee_status'] = 1;
				$this->model_setting_setting->editSetting('total_' . $payment . 'fee', $post);
			}
		}		

		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_' . $payment, $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}

		$data['heading_title'] = $this->language->get('heading_title_' . $payment);

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_version'] = $this->language->get('text_version');

		$data['entry_extra_contract'] = $this->language->get('entry_extra_contract');
		
		$data['entry_merchantid'] = $this->language->get('entry_merchantid');
		$data['entry_merchantkey'] = $this->language->get('entry_merchantkey');
		$data['entry_shopid'] = $this->language->get('entry_shopid');
		$data['entry_success'] = $this->language->get('entry_success');
		$data['entry_useb2b'] = $this->language->get('entry_useb2b');
		$data['entry_testmode'] = $this->language->get('entry_testmode');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_totalmax'] = $this->language->get('entry_totalmax');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_author'] = $this->language->get('entry_author');
		$data['entry_version_status'] = $this->language->get('entry_version_status');
		$data['entry_paymentfee'] = $this->language->get('entry_paymentfee');
		$data['entry_sisow_fee_tax'] = $this->language->get('entry_sisowfee_tax');
			
		if ($payment == 'sisowecare' || $payment == 'sisowklarna' || $payment == 'sisowklaacc' || $payment == 'sisowfocum' || $payment == 'sisowafterpay') {
			$data['entry_makeinvoice'] = $this->language->get('entry_makeinvoice');
			$data['entry_mailinvoice'] = $this->language->get('entry_mailinvoice');
			$data['text_none'] = 'Geen'; //$this->language->get('text_none');
		}

		if ($payment == 'sisowklarna') {
			$data['entry_createinvoice'] = $this->language->get('entry_createinvoice');
		}
		
		if ($payment != 'sisowklaacc') {
			$this->load->model('localisation/tax_class');
			$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
		}
		
		if ($payment == 'klarna' || $payment == 'klarnaacc') {
			$data['entry_pending'] = $this->language->get('entry_pending');
			$data['entry_klarnaid'] = $this->language->get('entry_klarnaid');
		}
		if ($payment == 'sisowovb') {
			$data['entry_businessonly'] = $this->language->get('entry_businessonly');
			$data['entry_days'] = $this->language->get('entry_days');
			$data['entry_paylink'] = $this->language->get('entry_paylink');
			$data['entry_ovbprefix'] = $this->language->get('entry_ovbprefix');
		}

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		}
		else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['username'])) {
			$data['error_username'] = $this->error['username'];
		}
		else {
			$data['error_username'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'href' => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], true),
			'text' => $this->language->get('text_home'),
			'separator' => false
			);

		$data['breadcrumbs'][] = array(
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true),
			'text' => $this->language->get('text_payment'),
			'separator' => ' :: '
			);

		$data['breadcrumbs'][] = array(
			'href' => $this->url->link("extension/payment/$payment", 'user_token=' . $this->session->data['user_token'], true),
			'text' => $this->language->get('heading_title_' . $payment),
			'separator' => ' :: '
			);
				
		$data['action'] = $this->url->link("extension/payment/$payment", 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		// Merchant ID
		if (isset($this->request->post['payment_' . $payment . '_merchantid'])) {
			$data['payment_' . $payment . '_merchantid'] = $this->request->post['payment_' . $payment . '_merchantid'];
		}
		else {
			$data['payment_' . $payment . '_merchantid'] = $this->config->get('payment_' . $payment . '_merchantid');
		}

		// Order status
		if (isset($this->request->post['payment_' . $payment . '_status_success'])) {
			$data['payment_' . $payment . '_status_success'] = $this->request->post['payment_' . $payment . '_status_success'];
		}
		else {
			$data['payment_' . $payment . '_status_success'] = $this->config->get('payment_' . $payment . '_status_success'); 
		} 

		// Test mode
		if (isset($this->request->post['payment_' . $payment . '_testmode'])) {
			$data['payment_' . $payment . '_testmode'] = $this->request->post['payment_' . $payment . '_testmode'];
		}
		else {
			$data['payment_' . $payment . '_testmode'] = $this->config->get('payment_' . $payment . '_testmode');
		}

		// Minimum
		if (isset($this->request->post['payment_' . $payment . '_total'])) {
			$data['payment_' . $payment . '_total'] = $this->request->post['payment_' . $payment . '_total'];
		} else {
			$data['payment_' . $payment . '_total'] = $this->config->get('payment_' . $payment . '_total'); 
		} 

		// Maximum
		if (isset($this->request->post['payment_' . $payment . '_totalmax'])) {
			$data['payment_' . $payment . '_totalmax'] = $this->request->post['payment_' . $payment . '_totalmax'];
		} else {
			$data['payment_' . $payment . '_totalmax'] = $this->config->get('payment_' . $payment . '_totalmax'); 
		} 

		// Merchant Key
		if (isset($this->request->post['payment_' . $payment . '_merchantkey'])) {
			$data['payment_' . $payment . '_merchantkey'] = $this->request->post['payment_' . $payment . '_merchantkey'];
		}
		else {
			$data['payment_' . $payment . '_merchantkey'] = $this->config->get('payment_' . $payment . '_merchantkey'); 
		} 
		
		// ShopID
		if (isset($this->request->post['payment_' . $payment . '_shopid'])) {
			$data['payment_' . $payment . '_shopid'] = $this->request->post['payment_' . $payment . '_shopid'];
		}
		else {
			$data['payment_' . $payment . '_shopid'] = $this->config->get('payment_' . $payment . '_shopid'); 
		} 
		
		// Geo Zone
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['payment_' . $payment . '_geo_zone_id'])) {
			$data['payment_' . $payment . '_geo_zone_id'] = $this->request->post['payment_' . $payment . '_geo_zone_id'];
		} else {
			$data['payment_' . $payment . '_geo_zone_id'] = $this->config->get('payment_' . $payment . '_geo_zone_id'); 
		} 

		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		// Active y/n
		if (isset($this->request->post['payment_' . $payment . '_status'])) {
			$data['payment_' . $payment . '_status'] = $this->request->post['payment_' . $payment . '_status'];
		}
		else {
			$data['payment_' . $payment . '_status'] = $this->config->get('payment_' . $payment . '_status');
		}
		
		// Status new
		if (isset($this->request->post['payment_' . $payment . '_status_new'])) {
			$data['payment_' . $payment . '_status_new'] = $this->request->post['payment_' . $payment . '_status_new'];
		}
		else {
			$data['payment_' . $payment . '_status_new'] = $this->config->get('payment_' . $payment . '_status_new');
			
			if(empty($data['payment_' . $payment . '_status_new'])){
				$data['payment_' . $payment . '_status_new'] = 1;
			}
		}
		
		// Status cancelled
		if (isset($this->request->post['payment_' . $payment . '_status_cancelled'])) {
			$data['payment_' . $payment . '_status_cancelled'] = $this->request->post['payment_' . $payment . '_status_cancelled'];
		}
		else {
			$data['payment_' . $payment . '_status_cancelled'] = $this->config->get('payment_' . $payment . '_status_cancelled');
			
			if(empty($data['payment_' . $payment . '_status_cancelled'])){
				$data['payment_' . $payment . '_status_cancelled'] = 7;
			}
		}
		
		// Sort order
		if (isset($this->request->post['payment_' . $payment . '_sort_order'])) {
			$data['payment_' . $payment . '_sort_order'] = $this->request->post['payment_' . $payment . '_sort_order'];
		}
		else {
			$data['payment_' . $payment . '_sort_order'] = $this->config->get('payment_' . $payment . '_sort_order');
		}
		
		if ($payment == 'sisowecare' || $payment == 'sisowklarna' || $payment == 'sisowklaacc' || $payment == 'sisowfocum' || $payment == 'sisowafterpay') {
			// Make invoice
			if (isset($this->request->post['payment_' . $payment . '_makeinvoice'])) {
				$data['payment_' . $payment . '_makeinvoice'] = $this->request->post['payment_' . $payment . '_makeinvoice'];
			}
			else {
				$data['payment_' . $payment . '_makeinvoice'] = $this->config->get('payment_' . $payment . '_makeinvoice');
			}
			// Mail invoice
			if (isset($this->request->post['payment_' . $payment . '_mailinvoice'])) {
				$data['payment_' . $payment . '_mailinvoice'] = $this->request->post['payment_' . $payment . '_mailinvoice'];
			}
			else {
				$data['payment_' . $payment . '_mailinvoice'] = $this->config->get('payment_' . $payment . '_mailinvoice');
			}
		}
		if ($payment == 'sisowklarna') {
			// Create invoice
			if (isset($this->request->post['payment_' . $payment . '_createinvoice'])) {
				$data['payment_' . $payment . '_createinvoice'] = $this->request->post['payment_' . $payment . '_createinvoice'];
			}
			else {
				$data['payment_' . $payment . '_createinvoice'] = $this->config->get('payment_' . $payment . '_createinvoice');
			}
		}
		if ($payment != 'sisowklaacc' && $payment != 'capayable') {
			// Payment fee
			if (isset($this->request->post['payment_' . $payment . '_paymentfee'])) {
				$data['payment_' . $payment . '_paymentfee'] = $this->request->post['payment_' . $payment . '_paymentfee'];
			}
			else {
				$data['payment_' . $payment . '_paymentfee'] = $this->config->get('payment_' . $payment . '_paymentfee');
			}
			// Payment fee tax class
			if (isset($this->request->post['payment_' . $payment . '_fee_tax'])) {
				$data['payment_' . $payment . '_fee_tax'] = $this->request->post['payment_' . $payment . '_fee_tax'];
			}
			else {
				$data['payment_' . $payment . '_fee_tax'] = $this->config->get('payment_' . $payment . '_fee_tax');
			}
		}
		if ($payment == 'sisowklarna' || $payment == 'sisowklaacc') {
			// Pending status
			if (isset($this->request->post['payment_' . $payment . '_status_pending'])) {
				$data['payment_' . $payment . '_status_pending'] = $this->request->post['payment_' . $payment . '_status_pending'];
			}
			else {
				$data['payment_' . $payment . '_status_pending'] = $this->config->get('payment_' . $payment . '_status_pending'); 
			}
			// Klarna Merchant ID
			if (isset($this->request->post['payment_' . $payment . '_klarnaid'])) {
				$data['payment_' . $payment . '_klarnaid'] = $this->request->post['payment_' . $payment . '_klarnaid'];
			}
			else {
				$data['payment_' . $payment . '_klarnaid'] = $this->config->get('payment_' . $payment . '_klarnaid'); 
			}
		}
		if ($payment == 'sisowovb') {
			// Business only
			if (isset($this->request->post['payment_' . $payment . '_businessonly'])) {
				$data['payment_' . $payment . '_businessonly'] = $this->request->post['payment_' . $payment . '_businessonly'];
			}
			else {
				$data['payment_' . $payment . '_businessonly'] = $this->config->get('payment_' . $payment . '_businessonly');
			}
			// Dagen
			if (isset($this->request->post['payment_' . $payment . '_days'])) {
				$data['payment_' . $payment . '_days'] = $this->request->post['payment_' . $payment . '_days'];
			}
			else {
				$data['payment_' . $payment . '_days'] = $this->config->get('payment_' . $payment . '_days');
			}
			// Paylink
			if (isset($this->request->post['payment_' . $payment . '_paylink'])) {
				$data['payment_' . $payment . '_paylink'] = $this->request->post['payment_' . $payment . '_paylink'];
			}
			else {
				$data['payment_' . $payment . '_paylink'] = $this->config->get('payment_' . $payment . '_paylink');
			}
			// Prefix
			if (isset($this->request->post['payment_' . $payment . '_prefix'])) {
				$data['payment_' . $payment . '_prefix'] = $this->request->post['payment_' . $payment . '_prefix'];
			}
			else {
				$data['payment_' . $payment . '_prefix'] = $this->config->get('payment_' . $payment . '_prefix');
			}
		}
		
		if ($payment == 'sisowklarna' || $payment == 'sisowklaacc') {
			// use B2B?
			if (isset($this->request->post['payment_' . $payment . '_useb2b'])) {
				$data['payment_' . $payment . '_useb2b'] = $this->request->post['payment_' . $payment . '_useb2b'];
			}
			else {
				$data['payment_' . $payment . '_useb2b'] = $this->config->get('payment_' . $payment . '_useb2b'); 
			}
		}
		
		//print_r($data);
		//exit;
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		$this->response->setOutput($this->load->view("extension/payment/$payment", $data));
	}

	public function _validate($payment) {

		if (!$this->user->hasPermission('modify', "extension/payment/$payment")) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!@$this->request->post['payment_' . $payment . '_merchantid']) {
			$this->error['merchantid'] = $this->language->get('error_merchantid');
		}

		if (!@$this->request->post['payment_' . $payment . '_merchantkey']) {
			$this->error['merchantkey'] = $this->language->get('error_merchantkey');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>
