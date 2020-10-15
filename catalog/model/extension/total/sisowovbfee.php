<?php
class ModelExtensionTotalsisowovbFee extends Model {
	public function getTotal($total){
		if (isset($this->session->data['payment_method']) && $this->session->data['payment_method']['code'] == 'sisowovb' && ($fee = $this->config->get('payment_sisowovb_paymentfee'))) {
			if ($fee < 0) {
				$fee = round($total['total'] * -$fee / 100.0, 2);
			}
			
			$total['total'] += $fee;
			$total['totals'][] = array(
				'code'       => 'sisowovbfee',
				'title'      => 'Overboeking fee:',
				'value'      => $fee,
				'sort_order' => $this->config->get('total_sisowovbfee_sort_order')
			);
			
			$tax_rates = $this->tax->getRates($fee, $this->config->get('payment_sisowovbfee_tax'));

			foreach ($tax_rates as $tax_rate) {
				if (!isset($total['taxes'][$tax_rate['tax_rate_id']])) {
					$total['taxes'][$tax_rate['tax_rate_id']] = $tax_rate['amount'];
				} else {
					$total['taxes'][$tax_rate['tax_rate_id']] += $tax_rate['amount'];
				}
			}
		}
	}
}
?>